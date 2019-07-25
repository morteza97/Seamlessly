<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchActivityRecord extends Model
{
    protected $fillable = [
        'training_center_id','researches_title','start_date',
        'end_date','address','phone','user_id'
    ];

    public static function role(){
        return [
            'training_center_id.*'=>'required',
            'researches_title.*'=>'required',
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
}
