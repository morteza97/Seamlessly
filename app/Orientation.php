<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orientation extends Model
{
    protected $fillable = ['title', 'field_of_study_id'];

    public static function rules() {
        return ['title' => 'required|min:5|max:50', 'field_of_study_id' => 'required'];
    }

    public function fieldOfStudy()
    {
        return $this->belongsTo(FieldOfStudy::class);
    }
}
