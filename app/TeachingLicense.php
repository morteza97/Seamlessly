<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachingLicense extends Model
{
    protected $fillable = [
        'lesson_id','license_number','issue_date','user_id'
    ];

    public static function role(){
        return [
            'lesson_id'=>'required',
            'license_number'=>'required',
            'issue_date'=>'required'
        ];
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
