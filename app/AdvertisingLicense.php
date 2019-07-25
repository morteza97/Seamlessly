<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisingLicense extends Model
{
    protected $fillable = [
        'file_number','license_number','issue_date','user_id'
    ];

    public static function role(){
        return [
            'file_number'=>'required',
            'license_number'=>'required',
            'issue_date'=>'required'
        ];
    }
}
