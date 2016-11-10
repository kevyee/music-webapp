<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public $timestamps = false;
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
       'user_id', 
       'email_address', 
       'username', 
       'date_of_birth', 
       'password', 
       'city_id', 
       'user_status_id', 
       'forget_password', 
       'created', 
       'updated',
    ];

    public $rules = [
            'email_address' => 'required|email|unique:user,email_address',
            'username' => 'required|min:6|unique:user,username|alpha_dash',
            'password' => 'min:8|required',
            'confirm_password' => 'required|same:password',
            'date_of_birth' => 'required|date',
            'city_id' => 'required',
    ];

    public $login_rules = [
            'email_address' => 'required|email',
            'password' => 'required',
    ];

    public $update_rules = [
            'username' => 'required|min:6|unique:user,username,{id},username',
            'date_of_birth' => 'required|date',
            'city_id' => 'required',
    ];


    protected $hidden = [
        'password',
    ];
}
