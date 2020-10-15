<?php

namespace App\Http\Controllers;

use App\Contents;
use App\Helpers\UploadPaths;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function pendingView()
    {
        $contents = DB::table('contents')->where('is_approve', '=', '0')->where('deleted_at', '=', null)->get();
        return view('admin.content.pending', compact('contents'));
    }

    public function newcontentView()
    {
        $category = DB::table('category')->get();
        return view('admin.content.new', compact('category'));
    }

    public function contentCreate(Request $request)
    {
        $title = $request->get('title');
        $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ');
        $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-');
        $filePhotoUrl = $request->file('photo');
        if (isset($filePhotoUrl)) {
            $contentPhotoName = uniqid('content_') . '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('content_photos'), $contentPhotoName);
        }
        Contents::create([
            'title' => $title,
            'text' => $request->get('text'),
            'photo' => $contentPhotoName,
            'is_approve' => false,
            'writer' => Auth::user()->id,
            'organizer' => Auth::user()->id,
            'category' => $request->get('category'),
            'search_title' => mb_strtolower(str_replace($search, $replace, $title))
        ]);
        session()->flash('content-success', 'Success to Save Content');
        return back();
    }

    public function publishedView()
    {
        $contents = DB::table('contents')->where('is_approve', '=', '1')->where('deleted_at', '=', null)->get();
        return view('admin.content.published', compact('contents'));
    }

    public function contentPublished($id)
    {
        DB::table('contents')->where('id', '=', $id)->update(['is_approve' => '1', 'published_at' => Carbon::now(), 'deleted_at' => null]);//content published updated is_approve and published_at
        session()->flash('content-published', 'Published Successfully');
        return back();
    }

    public function editView($id)
    {
        $contents = DB::table('contents')->where('id', '=', $id)->get();
        return view('admin.content.edit', compact('contents'));
    }

    public function contentEdit(Request $request, $id)
    {
        $title = $request->get('title');
        $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ');
        $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-');
        $filePhotoUrl = $request->file('photo');
        if ($filePhotoUrl == null) {
            Contents::where('id', $id)->update([
                'title' => $title,
                'text' => $request->get('text'),
                'is_approve' => false,
                'organizer' => Auth::user()->id,
                'updated_at' => Carbon::now(),
                'search_title' => mb_strtolower(str_replace($search, $replace, $title))
            ]);
        } else {
            $contentPhotoName = uniqid('content_') . '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('content_photos'), $contentPhotoName);
            Contents::where('id', $id)->update([
                'title' => $title,
                'text' => $request->get('text'),
                'photo' => $contentPhotoName,
                'is_approve' => false,
                'organizer' => Auth::user()->id,
                'updated_at' => Carbon::now(),
                'search_title' => mb_strtolower(str_replace($search, $replace, $title))
            ]);
        }
        session()->flash('content-edit', ' Successfully Modified');
        return back();
    }

    public function deletedView()
    {
        $contents = DB::table('contents')->whereNotNull('deleted_at')->get();
        return view('admin.content.deleted', compact('contents'));
    }

    public function contentDelete($id)
    {
        DB::table('contents')->where('id', '=', $id)->update(['deleted_at' => Carbon::now(), 'is_approve' => '0']);//content delete updated delete_at
        session()->flash('content-delete', 'Successfully Deleted');
        return back();
    }

    public function contenthardDelete($id)
    {
        DB::table('contents')->delete($id);//content delete updated delete_at
        session()->flash('content-hard-delete', 'Successfully Hard Deleted');
        return back();
    }

    public function commentsView()
    {
        $contents = DB::table('contents')->get();
        return view('admin.content.comments.comments-view', compact('contents'));
    }

    public function commentsEdit($id)
    {
        $content = DB::table('contents')->where('id', '=', $id)->get();
        $waiting_comments = DB::table('comments')
            ->join('contents', 'content_id', '=', 'contents.id')
            ->where([['comments.is_approve', '=', false], ['comments.deleted_at', '=', null], ['contents.id', '=', $id]])
            ->select('comments.id', 'comments.name', 'comments.email', 'comments.comment')->get();
        $published_comments = DB::table('comments')
            ->join('contents', 'content_id', '=', 'contents.id')
            ->where([['comments.is_approve', '=', true], ['comments.deleted_at', '=', null], ['contents.id', '=', $id]])
            ->select('comments.id', 'comments.name', 'comments.email', 'comments.comment')->get();
        $deleted_comments = DB::table('comments')
            ->join('contents', 'content_id', '=', 'contents.id')
            ->where([['comments.is_approve', '=', false], ['contents.id', '=', $id]])
            ->select('comments.id', 'comments.name', 'comments.email', 'comments.comment')->get();
        return view('admin.content.comments.comment', compact('waiting_comments', 'published_comments', 'deleted_comments', 'content'));
    }

    public function commentsOk($id)
    {
        DB::table('comments')->where('id', '=', $id)->update([
            'confirming' => Auth::user()->id,
            'published_at' => Carbon::now(),
            'is_approve' => '1',
            'deleted_at' => null
        ]);
        session()->flash('comment-ok', 'Comment Approved.');
        return back();
    }

    public function commentsDel($id)
    {
        DB::table('comments')->where('id', '=', $id)->update([
            'confirming' => Auth::user()->id,
            'deleted_at' => Carbon::now(),
            'is_approve'=>false
        ]);
        session()->flash('comment-del', 'Comment Has Been Deleted.');
        return back();

    }
    public function commentsHardDel($id)
    {
        DB::table('comments')->delete($id);
        session()->flash('comment-del', 'Comment Has Been Hard Deleted.');
        return back();

    }

}
