<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    protected $fillable = [
        'training_center_type_id','title','address','phone'
    ];

    public static function role(){
        return [
            'training_center_type_id'=>'required',
            'title'=>'required|min:5|max:50',
            'address'=>'required|min:2|max:200',
            'phone'=>'required|min:5|max:15'
        ];
    }

    public function trainingCenterType()
    {
        return $this->belongsTo(TrainingCenterType::class);
    }
}
