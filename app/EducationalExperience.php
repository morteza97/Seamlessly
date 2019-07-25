<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalExperience extends Model
{
    protected $fillable = [
        'training_center_id','lessons_title','grade_id','start_date',
        'end_date','address','phone','user_id'
    ];

    public static function role(){
        return [
            'training_center_id.*'=>'required',
            'lessons_title.*'=>'required',
            'grade_id.*'=>'required',
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
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
