<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Contents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $comments = DB::table('contents')
            ->join('comments', 'content_id', '=', 'contents.id')
            ->where([['comments.content_id', '=', $contents[0]->id],['comments.is_approve','=',true]])
            ->select()->get();
        $count=DB::table('contents')
            ->join('comments', 'content_id', '=', 'contents.id')
            ->where([['comments.content_id', '=', $contents[0]->id],['comments.is_approve','=',true]])
            ->count();
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        return view('content-post', compact(['contents', 'mostRead', 'featuredPosts', 'piece', 'user', 'comments','count']));
    }

    public function categoryView($category)
    {
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();
        if ($category == 'populer') {
            $categoryPost = DB::table('category')
                ->join('contents', 'contents.category', '=', 'category.id')
                ->where('is_approve', '=', '1')
                ->orderBy('viewing', 'desc')
                ->select()->get();
            return view('category', compact(['categoryPost', 'mostRead', 'featuredPosts', 'piece']));
        } else {
            $categoryPost = DB::table('category')
                ->join('contents', 'contents.category', '=', 'category.id')
                ->where([['category.check_name', '=', $category], ['contents.is_approve', '=', '1']])
                ->orderBy('published_at', 'desc')
                ->select()->get();
            return view('category', compact(['categoryPost', 'mostRead', 'featuredPosts', 'piece']));
        }
    }

    public function populerView()
    {
        $mostRead = $this->mostRead();
        return view('populer', compact('mostRead'));
    }

    public function bulletin(Request $reguest)
    {
        DB::table('bulletin')->insert([
            'email' => $reguest->get('email')
        ]);
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
            'is_approve'=>false
        ]);
        session()->flash('comment-success', 'Yorumunuz başarılı bir şekilde gönderildi. Editör onayından geçtikten sonra yayınlanacaktır.');
        return back();
    }
}
