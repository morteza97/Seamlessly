<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professors extends Model
{
    protected $fillable = [
        'ProfessorNumber','nickname','group_id', 'level_id'
    ];

    public function account()
    {
        return $this->belongsTo('App\User');
    }

    public function group() {
        return $this->belongsTo(ScientificGroup::class);
    }

    public function level() {
        return $this->belongsTo(ScientificLevel::class);
    }

    public function getGroup($id) {
        return ScientificGroup::find($id);
    }
    public function getLevel($id) {
        return ScientificLevel::find($id)->title;
    }
}
