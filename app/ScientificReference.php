<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScientificReference extends Model
{
    protected $fillable = [
        'first_name','last_name','relation_type','acquaintance_method','acquaintance_time',
        'reference_job','address','phone','user_id'
    ];

    public static function role(){
        return [
            'first_name.*'=>'required|min:3|max:50',
            'last_name.*'=>'required|min:3|max:50',
            'relation_type.*'=>'required|min:3|max:50',
            'acquaintance_method.*'=>'required|min:3|max:50',
            'acquaintance_time.*'=>'required|numeric',
            'reference_job.*'=>'required|min:3|max:50',
            'address.*'=>'required|min:3|max:50',
            'phone.*'=>'required|min:3|max:50',
        ];
    }
}
