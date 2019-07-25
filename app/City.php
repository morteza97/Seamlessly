<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'title','province_id'
    ];

    public static function role(){
        return [
            'title'=>'required|min:2|max:50'
        ];
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }


    public function alumniAssociations()
    {
        return $this->hasMany(AlumniAssociation::class);
    }

}
