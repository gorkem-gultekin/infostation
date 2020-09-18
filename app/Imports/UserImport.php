<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'name'=>$row[0],
            'username'=>$row[1],
            'email'=>$row[2],
            'password'=>$row[3]
        ]);
    }
}
