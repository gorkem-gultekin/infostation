<?php

namespace App\Http\Controllers;

use App\Contents;
use App\Helpers\UploadPaths;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\File;

class ContentController extends Controller
{
    public function pendingView()
    {
        $contents=DB::table('contents')->where('is_approve','=','0')->where('deleted_at','=',null)->get();
        return view('admin.content.pending', compact('contents'));
    }

    public function newcontentView()
    {
        return view('admin.content.new');
    }

    public function contentCreate(Request $request)
    {
        $title = $request->get('title');
        $text = $request->get('text');
        $filePhotoUrl = $request->file('photo');
        if (isset($filePhotoUrl)) {
            $contentPhotoName = uniqid('content_') . '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('content_photos'), $contentPhotoName);
        }

        Contents::create([
            'title' => $title,
            'text' => $text,
            'photo' => $contentPhotoName,
            'is_approve' => false,
            'writer' => Auth::user()->id
        ]);
        session()->flash('content-success','Success to save content');
        return back();
    }
    public function publishedView()
    {
        $contents=DB::table('contents')->where('is_approve','=','1')->where('deleted_at','=',null)->get();
        return view('admin.content.published',compact('contents'));

    }
    public function contentPublished($id)
    {
        DB::table('contents')->where('id','=',$id)->update(['is_approve'=>'1','published_at'=>Carbon::now(),'deleted_at'=>null]);//content published updated is_approve and published_at
    }

    public function deletedView()
    {
        $contents=DB::table('contents')->whereNotNull('deleted_at')->get();
        return view('admin.content.deleted',compact('contents'));
    }

    public function contentDelete($id)
    {
        DB::table('contents')->where('id','=',$id)->update(['deleted_at'=>Carbon::now(),'is_approve'=>'0']);//content delete updated delete_at
    }
    public function contenthardDelete($id)
    {
        DB::table('contents')->delete($id);//content delete updated delete_at
    }


}
