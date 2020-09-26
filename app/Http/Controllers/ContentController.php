<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contents;
use App\Helpers\UploadPaths;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\File;
use function GuzzleHttp\Promise\all;

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
        $filePhotoUrl = $request->file('photo');
        if (isset($filePhotoUrl)) {
            $contentPhotoName = uniqid('content_') . '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('content_photos'), $contentPhotoName);
        }
        Contents::create([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'photo' => $contentPhotoName,
            'is_approve' => false,
            'writer' => Auth::user()->id,
            'organizer' => Auth::user()->id,
            'category' => $request->get('category')
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
        $filePhotoUrl = $request->file('photo');
        if (isset($filePhotoUrl)) {
            $contentPhotoName = uniqid('content_') . '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('content_photos'), $contentPhotoName);
        }
        Contents::where('id', $id)->update([
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'photo' => $contentPhotoName,
            'is_approve' => false,
            'organizer' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);
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

    public function getContent($category)
    {
        if ($category == 'spor') {
            return DB::table('contents')->where('category', '=', '1')->get();
        }
        elseif ($category == 'finans')
        {
            return DB::table('category')
                ->join('contents','contents.category','=','category.id')
                ->select('contents.id','contents.title','contents.text','contents.photo','category.name')
                ->where('category', '=', '2')->get();
        }
        elseif ($category == 'magazin')
        {
            return DB::table('category')
                ->join('contents','contents.category','=','category.id')
                ->select('contents.id','contents.title','contents.text','contents.photo','category.name')
                ->where('category', '=', '3')->get();
        }
        elseif ($category == 'politika')
        {
            return DB::table('category')
                ->join('contents','contents.category','=','category.id')
                ->select('contents.id','contents.title','contents.text','contents.photo','category.name')
                ->where('category', '=', '4')->get();
        }
        elseif ($category == 'saglik')
        {
            return DB::table('category')
                ->join('contents','contents.category','=','category.id')
                ->select('contents.id','contents.title','contents.text','contents.photo','category.name')
                ->where('category', '=', '5')->get();
        }
        elseif ($category == 'egitim')
        {
            return DB::table('category')
                ->join('contents','contents.category','=','category.id')
                ->select('contents.id','contents.title','contents.text','contents.photo','category.name')
                ->where('category', '=', '6')->get();
        }  elseif ($category == 'teknoloji')
        {
            return DB::table('category')
                ->join('contents','contents.category','=','category.id')
                ->select('contents.id','contents.title','contents.text','contents.photo','category.name')
                ->where('category', '=', '7')->get();
        }
        else
        {
            return Contents::all();
        }
    }


}
