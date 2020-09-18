<?php

namespace App\Exports;

use App\Contents;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user=Contents::with(['user'])->get();
        return Contents::where('is_approve','=','1')->select('id','title','text',$user->name,'photo')->get();
    }
}
