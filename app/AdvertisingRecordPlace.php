<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisingRecordPlace extends Model
{
    protected $fillable = [
        'title'
    ];

    public static function role(){
        return [
            'title'=>'required|min:3|max:50'
        ];
    }
}
