<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed table_name
 */
class FieldsOtherValue extends Model
{
    protected $fillable = [
        'table_name','table_title','field_name','field_title','record_id','new_value',
        'applied'
    ];

    public static function role(){
        return [
            'table_name.*'=>'required',
            'table_title.*'=>'required',
            'record_id.*'=>'required|numeric',
            'new_value.*'=>'required',
            'applied.*'=>'required',
        ];
    }
}
