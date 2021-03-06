<?php

namespace App\Http\Controllers;

use App\Contents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth','verified'); //for verify email
    }

    public function mostRead()
    {
        $mostRead = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('is_approve', '=', '1')
            ->orderBy('viewing', 'desc')
            ->select()->get();
        return $mostRead;
    }

    public function featuredPosts()
    {
        $featuredPosts = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('is_approve', '=', '1')
            ->orderBy('published_at', 'desc')
            ->select()->get();
        return $featuredPosts;
    }

    public function piece()
    {
        for ($i = 1; $i <= 4; $i++) {
            $piece[$i] = DB::table('contents')
                ->where([['category', '=', $i], ['is_approve', '=', '1']])
                ->count();
        }
        return $piece;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $contents = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('is_approve', '=', '1')
            ->orderBy('published_at', 'desc')
            ->select()->get();
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        return view('index', compact(['contents', 'mostRead', 'featuredPosts', 'piece']));
    }

    public function contentPost($search_title)
    {
        $user = DB::table('contents')
            ->join('users', 'users.id', '=', 'contents.writer')
            ->where('contents.search_title', '=', $search_title)
            ->select()->get();
        $contents = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('contents.search_title', '=', $search_title)
            ->orderBy('viewing', 'desc')
            ->select()->get();
        $text=explode("/p",$contents[0]->text);
        $comments = DB::table('contents')
            ->join('comments', 'content_id', '=', 'contents.id')
            ->where([['comments.content_id', '=', $contents[0]->id], ['comments.is_approve', '=', true]])
            ->select()->get();
        $count = DB::table('contents')
            ->join('comments', 'content_id', '=', 'contents.id')
            ->where([['comments.content_id', '=', $contents[0]->id], ['comments.is_approve', '=', true]])
            ->count();
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        $viewing = DB::table('contents')->where('search_title', '=', $search_title)->select('viewing')->get();
        $new_viewing = $viewing[0]->viewing + 1;
        DB::table('contents')->where('search_title', '=', $search_title)->update(['viewing' => $new_viewing]);
        return view('content-post', compact(['contents', 'mostRead', 'featuredPosts', 'piece', 'user', 'comments', 'count','text']));
    }

    public function categoryView($category)
    {
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        $categoryPost = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where([['category.check_name', '=', $category], ['contents.is_approve', '=', '1']])
            ->orderBy('published_at', 'desc')
            ->select()->get();
        return view('category', compact(['categoryPost', 'mostRead', 'featuredPosts', 'piece']));
    }

    public function populerView()
    {
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        return view('populer', compact('mostRead', 'featuredPosts', 'piece'));
    }

    public function bulletin(Request $reguest)
    {
        $to_email = $reguest['email'];
        DB::table('bulletin')->insert([
            'email' => $to_email
        ]);
        $to_name = 'infoStation';
        $body = ['email'=>$to_email];// mail content
        Mail::send('email.register-mail', $body, function ($message)
        use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Welcome Aboard!');
            $message->from(env('MAIL_USERNAME'), 'infoStation');
        });
        session()->flash('bulletin-success', 'Bültenimize Katıldınız.');
        return back();
    }

    public function contactView()
    {
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        return view('contact', compact(['mostRead', 'featuredPosts', 'piece']));
    }

    public function contactMessage(Request $request)
    {
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        DB::table('contact')->insert([
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message']
        ]);
        session()->flash('contact-success', 'Mesajınız Tarafımıza Ulaşmıştır.');
        return view('contact', compact(['mostRead', 'featuredPosts', 'piece']));
    }

    public function commentCreate(Request $request, $id)
    {
        DB::table('comments')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'comment' => $request['comment'],
            'content_id' => $id,
            'is_approve' => false
        ]);
        session()->flash('comment-success', 'Yorumunuz başarılı bir şekilde gönderildi. Editör onayından geçtikten sonra yayınlanacaktır.');
        return back();
    }

    public function search(Request $request)
    {

        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        $q = $request['search'];
        if ($q != "") {
            $contents = Contents::where('title', 'LIKE', '%' . $q . '%')
                ->orWhere('text', 'LIKE', '%' . $q . '%')
                ->get();

            if (count($contents) > 0) {
                return view('search', compact('mostRead', 'featuredPosts', 'piece'))->withDetails($contents)->withQuery($q);
            }
        }
        return view('search', compact('mostRead', 'featuredPosts', 'piece'))->withMessage("Aradığınız Bulunamadı");
    }
    public function forumView()
    {
        return view('soon');
    }
}
