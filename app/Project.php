<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function roles(){
        return $this->hasMany(Role::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'users_projects');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
