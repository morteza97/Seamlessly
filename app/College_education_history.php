<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Verta;

class College_education_history extends Model
{
    public function getCountry($id) {
        return Country::find($id)->title;
    }

    public function getUniversity($id) {
        return University::find($id)->title;
    }

    public function getGrade($id) {
        return Grade::find($id)->title;
    }

    public function getFieldOfStudy($id) {
        return FieldOfStudy::find($id)->title;
    }

    public function getOrientation($id) {
        return Orientation::find($id)->title;
    }

    public function getYear($date) {
        $v = new Verta($date);
        return $v->year;
    }

    public function getDate($date) {
        $v = new Verta($date);
        return $v->formatDate();
    }
}
