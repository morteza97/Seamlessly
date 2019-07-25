<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonType extends Model
{
    protected $fillable = ['title'];

    public static function rules(){
        return [
            'title'=>'required|min:2|max:50',
        ];
    }
}
