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
    protected $fillable = ['name', 'password', 'email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function project(){
        return $this->belongsToMany(Project::class);
    }

    public function role(){
        return $this->hasMany(Role::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }
}
