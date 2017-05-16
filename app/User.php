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


    public function projects(){
        return $this->belongsToMany(Project::class, 'users_projects');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
