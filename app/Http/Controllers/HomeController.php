<?php

namespace App\Http\Controllers;

use App\Category;
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
        // $this->middleware('auth','verified'); //for verify email
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
        $mostRead = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('is_approve', '=', '1')
            ->orderBy('viewing', 'desc')
            ->select()->get();
        for ($i = 1; $i <= 4; $i++) {
            $viewing[$i] = DB::table('contents')
                ->where('category', '=', $i)
                ->count();
        }
        return view('index', compact(['contents', 'mostRead', 'viewing']));
    }

    public function contentPost($id)
    {
        $user = DB::table('users')
            ->join('contents', 'contents.writer', '=', 'users.id')
            ->where('contents.id', '=', $id)
            ->select()->get();
        $contents = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('contents.id', '=', $id)
            ->orderBy('viewing', 'desc')
            ->select()->get();
        $mostRead = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('is_approve', '=', '1')
            ->orderBy('viewing', 'desc')
            ->select()->get();
        for ($i = 1; $i <= 4; $i++) {
            $viewing[$i] = DB::table('contents')
                ->where('category', '=', $i)
                ->count();
        }
        return view('content-post', compact(['contents', 'mostRead', 'viewing', 'user']));
    }
    public function categoryView($category)
    {
        $mostRead = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->where('is_approve', '=', '1')
            ->orderBy('viewing', 'desc')
            ->select()->get();
        for ($i = 1; $i <= 4; $i++) {
            $viewing[$i] = DB::table('contents')
                ->where('category', '=', $i)
                ->count();
        }
        $name = ucwords(str_replace('i','ı',$category));
            $categoryName = DB::table('category')
                ->join('contents', 'contents.category', '=', 'category.id')
                ->where('category.name', '=', $name)
                ->orderBy('published_at', 'desc')
                ->select()->get();

        return view('category',compact(['categoryName','mostRead','viewing']));
    }

}
