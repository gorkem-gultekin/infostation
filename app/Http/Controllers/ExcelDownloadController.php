<?php

namespace App\Http\Controllers;

use App\Exports\ContentExport;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDownloadController extends Controller
{
    public function userExport()
    {
        return Excel::download(new UserExport, 'infostation-users.xlsx');
    }
    public function contentExport()
    {
        return Excel::download(new ContentExport, 'infostation-contents.xlsx');
    }
}
