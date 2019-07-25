<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorNotifications extends Model
{
    protected $fillable = ['title', 'expire_date', 'attachment'];
}
