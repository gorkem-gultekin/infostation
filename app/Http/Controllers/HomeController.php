<?php

namespace App\Http\Controllers;

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
        $user = DB::table('users')
            ->join('contents', 'contents.writer', '=', 'users.id')
            ->where('contents.search_title', '=', $search_title)
            ->select()->get();
        $contents = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('contents.search_title', '=', $search_title)
            ->orderBy('viewing', 'desc')
            ->select()->get();
        $mostRead = $this->mostRead();
        $featuredPosts = $this->featuredPosts();
        $piece = $this->piece();

        return view('content-post', compact(['contents', 'mostRead', 'featuredPosts', 'piece', 'user']));
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

}
