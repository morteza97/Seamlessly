<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{

    protected $fillable = [
        'title','country_id'
    ];

    public static function role(){
        return [
            'title'=>'required|min:2|max:50'
        ];
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }


    public function alumniAssociations()
    {
        return $this->hasMany(AlumniAssociation::class);
    }

}
