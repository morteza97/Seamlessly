<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaarefLessons extends Model
{
    protected $fillable = ['title','lesson_number','unit','active','grade_id','lesson_type_id','lesson_method_id','lesson_gender_id','scientific_groups_id'];
}
