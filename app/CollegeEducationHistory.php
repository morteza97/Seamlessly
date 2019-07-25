<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeEducationHistory extends Model
{
    protected $fillable = [
        'grade_id','field_of_study_id','orientation_id','average','training_center_id','country_id','start_date',
        'end_date','official_document','user_id'
    ];

    public static function role(){
        return [
            'grade_id.*'=>'required|numeric',
            'field_of_study_id.*'=>'required',
            'orientation_id.*'=>'required',
            'average.*'=>'required|numeric',
            'training_center_id.*'=>'required',
            'country_id.*'=>'required',
            'start_date.*'=>'required|date',
            'end_date.*'=>'required|date',
        ];
    }


    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function fieldOfStudy()
    {
        return $this->belongsTo(FieldOfStudy::class);
    }
    public function orientation()
    {
        return $this->belongsTo(Orientation::class);
    }
    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
