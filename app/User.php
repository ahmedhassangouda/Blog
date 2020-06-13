<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','gander'
    ];
    
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function isAdmin()
    {
        return $this->role == 'Admin';
    }

    public function isModerator()
    {
        return $this->role == 'Moderator';
    }
    
    public function getAvatar($gander)
    {
        if($gander == 'Male'){
            
            return  "https://image.flaticon.com/icons/svg/145/145843.svg";
        }else{
            return  "https://image.flaticon.com/icons/svg/145/145850.svg";
        }

    }

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
}
