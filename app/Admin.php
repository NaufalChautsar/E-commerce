<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
// use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use Notifiable;
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'email_verfied_at'
    ];
    protected $hidden = ['password'];
}
