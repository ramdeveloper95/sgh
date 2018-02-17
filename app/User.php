<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table= 'users';
    protected $fillable = ['nombre', 'email', 'password','api_token'];
    public $timestamps = false;

    protected $hidden = [ 'password', 'remember_token','api_token'];
}
