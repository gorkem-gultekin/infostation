<?php

namespace App\Exports;

use App\Contents;
use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()

    {
        $user=DB::table('users')
            ->join('contents','contents.writer','=','users.id')
            ->select('contents.id','contents.title','contents.text','contents.photo','users.name','is_approve','category','search_title')
            ->get();
        return $user;
    }
}
