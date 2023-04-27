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
        'name', 'email', 'organization', 'password' , 'status', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
        if($this->role_id == 1)
        {
            return $this->role_id;
        }
        else if($this->role_id == 2)
        {
            return $this->role_id;
        }
        else if($this->role_id == 3)
        {
            return $this->role_id;
        }
        else
        {
            return false;
        }
    }
}
