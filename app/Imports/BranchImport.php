<?php

namespace App\Imports;

use App\BranchLocation;
use Maatwebsite\Excel\Concerns\ToModel;

class BranchImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BranchLocation([
            'name'=>$row[1],
            'code'=>$row[2],
            'address'=>$row[3]
        ]);
    }
}
