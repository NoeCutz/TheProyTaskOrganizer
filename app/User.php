<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//se Illuminate\Database\Eloquent\Model;
use App\Project;
use App\Role;
use App\Review;
use App\Task;


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
        return $this->belongsToMany(Project::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
