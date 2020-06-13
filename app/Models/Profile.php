<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable  = [
        'bio','about','date_of_birth','fb','tw','gh','state','country','wapp','pic','user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
