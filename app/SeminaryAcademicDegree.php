<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminaryAcademicDegree extends Model
{
    protected $fillable = [
        'title'
    ];

    public static function role(){
        return [
            'title'=>'required|min:5|max:15'
        ];
    }

}
