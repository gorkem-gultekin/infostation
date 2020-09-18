<?php

namespace App\Http\Controllers;

use App\Contents;
use App\Helpers\UploadPaths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ContentController extends Controller
{
    public function pendingView()
    {
       // $pending = Content::where('is_approve', '=', '0')->get();
        $pendingApproval=Contents::with(['user'])->get();
        return view('admin.content.pending', compact('pendingApproval'));
    }

    public function newcontent()
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
        //DB::table('contents')->insert([
        Contents::create([
            'title' => $title,
            'text' => $text,
            'photo' => $contentPhotoName,
            'is_approve' => false,
            'writer' => Auth::user()->id
        ]);
        return "başarılı";
    }

}
