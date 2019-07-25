<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminaryAcademicDegreeHistory extends Model
{
    protected $fillable = [
        'seminary_academic_degree_id','seminary_field_of_study_id','training_center_id','average',
        'start_date','end_date','official_document','user_id'
    ];

    public static function role(){
        return [
            'seminary_academic_degree_id.*'=>'required',
            'seminary_field_of_study_id.*'=>'required',
            'training_center_id.*'=>'required|numeric',
            'average.*'=>'required|numeric',
            'start_date.*'=>'required|date',
            'end_date.*'=>'required|date',
            'official_document.*'=>'required'
        ];
    }


    public function seminaryAcademicDegree()
    {
        return $this->belongsTo(SeminaryAcademicDegree::class);
    }

    public function seminaryFieldOfStudy()
    {
        return $this->belongsTo(SeminaryFieldOfStudy::class);
    }

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }

}
