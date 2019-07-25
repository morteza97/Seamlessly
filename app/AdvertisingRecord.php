<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertisingRecord extends Model
{
    protected $fillable = [
        'training_center_id','advertising_record_place_id','start_date',
        'end_date','address','phone','user_id'
    ];

    public static function role(){
        return [
            'training_center_id.*'=>'required',
            'advertising_record_place_id.*'=>'required',
            'start_date.*'=>'required|date',
            'end_date.*'=>'required|date',
            'address.*'=>'required',
            'phone.*'=>'required'
        ];
    }
    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }
    public function advertisingRecordPlace()
    {
        return $this->belongsTo(AdvertisingRecordPlace::class);
    }
}
