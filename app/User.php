<?php

namespace truonghoc;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function news()
    {
        return $this->hasMany('truonghoc\News', 'user_id', 'id');
    }

    public function active()
    {
        return $this->hasMany('truonghoc\Active', 'user_id', 'id');
    }

    public function document()
    {
        return $this->hasMany('truonghoc\Document', 'user_id', 'id');
    }

    public function alert()
    {
        return $this->hasMany('truonghoc\Alert', 'user_id', 'id');
    }
}
