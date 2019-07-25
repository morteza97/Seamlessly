<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $fillable = [
        'title'
    ];

    public static function role(){
        return [
            'title'=>'required|min:3|max:15'
        ];
    }

    public function alumniAssociations()
    {
        return $this->hasMany(AlumniAssociation::class);
    }
}
