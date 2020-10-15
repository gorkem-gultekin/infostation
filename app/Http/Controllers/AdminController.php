<?php

namespace App\Http\Controllers;

use App\Helpers\UploadPaths;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $posts = DB::table('category')
            ->join('contents', 'contents.category', '=', 'category.id')
            ->orderBy('created_at', 'desc')
            ->select()->get();
        return view('home',compact('posts'));
    }

    public function indexView()
    {
        $users = User::where('deleted_at', '=', null)->get(); //tabloda deleted_at sütunu boş olanları çeker
        return view('admin.users.users', compact('users'));
    }

    public function updateView($id)
    {
        $user = User::where('id', $id)->get();
        $user = $user->first();
        return view('admin.users.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $filePhotoUrl = $request->file('photo');
        $password = $request->get('password');
        if ($filePhotoUrl == null)
        {
            User::where('id', $id)->update([
                'name' => $request->get('name'),
                'username' => $request->get('username'),
                'email' => $request->get('email'),
                'password' => Hash::make($password),
                'updated_at' => Carbon::now()
            ]);
        }
        else
        {
            $profilePhotoName = uniqid('profile_') . '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('profile_photos'), $profilePhotoName);
            User::where('id', $id)->update([
                'name' => $request->get('name'),
                'username' => $request->get('username'),
                'email' => $request->get('email'),
                'password' => Hash::make($password),
                'photo' => $profilePhotoName,
                'updated_at' => Carbon::now()
            ]);
        }
        session()->flash('user-update', 'Registration Successfully Updated');
        return back();
    }
    public function delete($id)
    {
        DB::table('users')->where('id', '=', $id)->update(['deleted_at' => Carbon::now()]);//id'ye ait kullanıcının deleted_at sütununa silme tarihi ekler ama tabloda durur soft delete
        session()->flash('user-delete', 'Successfully Deleted');
        return back();
    }
    public function adminContact()
    {
         $contact=DB::table('contact')->get();
         return view('admin.contact.messageView',compact('contact'));
    }
    public function bulletinView()
    {
        $bulletin_members=DB::table('bulletin')->get();
        return view('admin.contact.bulletin',compact('bulletin_members'));
    }

}
