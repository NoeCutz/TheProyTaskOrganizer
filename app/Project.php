<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function role(){
        return $this->hasMany(Role::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }
}
