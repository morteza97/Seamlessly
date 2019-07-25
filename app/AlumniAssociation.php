<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class AlumniAssociation extends Model
{
    protected $fillable = [
        'father_name','birth_certificate_number','birth_place','issue_place','religion_id','country_id',
        'marital_status_id','home_phone',/*'province_id',*/'city_id','home_Address','work_place_phone',
        'required_phone','public_conscription_status_id','conscription_end_date','seminary_grade_id','user_id'
    ];

    public static function role(){
        return [
            'father_name'=>'required|min:2|max:50',
            'birth_certificate_number'=>'required|numeric',
            'birth_place'=>'required|min:2|max:100',
            'issue_place'=>'required|min:2|max:100',
            'home_phone'=>'required|min:5|max:50',
            'home_Address'=>'required|min:5|max:250',
            'required_phone'=>'required|min:5|max:50',
            'public_conscription_status_id'=>'required',

        ];
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }
    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function seminaryGrade()
    {
        return $this->belongsTo(SeminaryGrade::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
