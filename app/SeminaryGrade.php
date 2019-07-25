<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminaryGrade extends Model
{
    protected $fillable = [
        'title'
    ];

    public static function role(){
        return [
            'title'=>'required|min:5|max:15'
        ];
    }

    public function alumniAssociations()
    {
        return $this->hasMany(AlumniAssociation::class);
    }

}
