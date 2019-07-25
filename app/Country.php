<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    public static function rules(){
        return ['title' => 'required|min:5|max:50'];
    }

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
