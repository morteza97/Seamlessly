<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'FirstName','LastName','NationalCode', 'username', 'email', 'password','mobile','code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function username()
    {
        return 'username';
    }

    /*public function getUserNameAttribute($value) {
        return decrypt($value);
    }

    public function setUserNameAttribute($value) {
        $this->attributes['username'] = bcrypt($value);
    }*/

    public function professor()
    {
        return $this->hasOne(Professors::class);
    }

    public function resumes()
    {
        return $this->hasMany(Resumes::class);
    }

    public function user_resume_by_activity_type($user_id, $activity_type_id)
    {
        $resumes = Resumes::where(['user_id'=> $user_id , 'activity_type_id' => $activity_type_id])
            ->orderBy('year', 'desc')
            ->paginate(20);
        return $resumes;
    }
}
