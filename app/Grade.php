<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['title'];

    public static function rules(){
        return ['title' => 'required|min:5|max:50'];
    }
}
