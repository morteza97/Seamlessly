<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed city
 */
class EmploymentRecord extends Model
{
    protected $fillable = [
        'workplace_name','responsibility_type_id','city_id','start_date',
        'end_date','address','phone','user_id'
    ];

    public static function role(){
        return [
            'workplace_name.*'=>'required',
            'responsibility_type_id.*'=>'required',
            'city_id.*'=>'required',
            'start_date.*'=>'required|date',
            'end_date.*'=>'required|date',
            'address.*'=>'required',
            'phone.*'=>'required'
        ];
    }
    public function responsibilityType()
    {
        return $this->belongsTo(ResponsibilityType::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
