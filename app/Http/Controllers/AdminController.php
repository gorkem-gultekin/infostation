<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use function Complex\negative;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
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
        $password = $request->get('password');
        User::where('id', $id)->update([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($password),
            'updated_at' => Carbon::now()
        ]);
        return "<script>alert('Kayıt Güncellendi!')</script>";
    }

    public function delete($id)
    {
        DB::table('users')->where('id', '=', $id)->update(['deleted_at' => Carbon::now()]);//id'ye ait kullanıcının deleted_at sütununa silme tarihi ekler ama tabloda durur soft delete
        return "<script>alert('Başarıyla Silindi')</script>" . back();
    }

    public function userCreate(Request $request)
    {
        //$data = $request->all();//textboxtaki girilen verilerin hepsini alır
        $password = $request->get('password');
        DB::table('users')->insert([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($password),
            'created_at' => Carbon::now(),
            'position' => ('user')
        ]);
        return "<script>alert('Kayıt başarıyla tamamlandı!')</script>";
    }



}
