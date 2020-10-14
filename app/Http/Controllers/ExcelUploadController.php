<?php

namespace App\Http\Controllers;

use App\Imports\ContentImport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelUploadController extends Controller
{
    //excel user added
    public function userImport()
    {
        //başarılı diye mesaj ekle
        Excel::import(new UserImport, request()->file('file'));
        return back();//bulunduğu sayfaya geri döner yeniler
    }
    //excel content added
    public function contentImport()
    {
        //başarılı diye mesaj ekle
        Excel::import(new ContentImport, request()->file('file'));
        return back();//bulunduğu sayfaya geri döner yeniler
    }


}
