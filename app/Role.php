<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function task(){
        return $this->belongsToMany(Task::class);
    }
}
