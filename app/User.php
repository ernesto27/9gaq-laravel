<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static $validationRules = [
        'username' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required'
    ];

    public static $validationRulesProfile = [
        'file' => 'required|mimes:jpg,jpeg,png,gif'
    ];

}
