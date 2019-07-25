<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCenterType extends Model
{
    protected $fillable = [
        'title'
    ];

    public static function role(){
        return [
            'title'=>'required|min:5|max:50'
        ];
    }

    public function trainingCenters(){
        return $this->hasMany(TrainingCenter::class);
    }

}
