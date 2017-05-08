<?php
namespace App;
class Project
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'description',];

    public function tasks()
    {
      return $this->hasMany(Task::class);
    }
}
