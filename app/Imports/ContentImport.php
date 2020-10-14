<?php

namespace App\Imports;

use App\Contents;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class ContentImport implements ToModel
{
    public function model(array $row)
    {
        return new Contents([
            'title'=>$row[1],
            'text'=>$row[2],
            'photo'=>$row[3],
            'writer'=>$row[4],
            'organizer'=>$row[4],
            'is_approve'=>false,
            'category'=>$row[6],
            'search_title'=>$row[7],
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
