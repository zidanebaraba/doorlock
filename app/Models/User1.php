<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User1 extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'id',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
