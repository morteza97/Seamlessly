<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorTermLessons extends Model
{
    protected $fillable = ['user_id', 'term_id', 'lesson_id','students_number','period','day','time', 'lesson_group',
        'test_date', 'test_time', 'detail'];
}
