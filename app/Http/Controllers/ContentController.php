<?php

namespace App\Http\Controllers;

use App\Content;
use App\Helpers\UploadPaths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function pending()
    {
       return view('admin.content.pending');
    }
    public function newcontent()
    {
        return view('admin.content.new');
    }
    public function contentCreate(Request $request)
    {
        $title=$request->get('title');
        $text=$request->get('text');
        $filePhotoUrl=$request->file('photo');
        if (isset($filePhotoUrl))
        {
            $contentPhotoName=uniqid('content_').'.'.$filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('content_photos'),$contentPhotoName);
        }
        DB::table('content')->insert([
            'title'=>$title,
            'text'=>$text,
            'photo'=>$contentPhotoName,
            'is_approve'=>false,
            'writer'=>Auth::user()->id
        ]);
        return "başarılı";
    }
}
