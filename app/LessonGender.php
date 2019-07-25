<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonGender extends Model
{
    protected $fillable = ['title'];

    public static function rules(){
        return [
            'title'=>'required|min:2|max:50',
        ];
    }
}
