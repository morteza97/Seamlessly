<?php

namespace App\Imports;

use App\MaarefLessons;
use Maatwebsite\Excel\Concerns\ToModel;

class LessonsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MaarefLessons([
            //
        ]);
    }
}
