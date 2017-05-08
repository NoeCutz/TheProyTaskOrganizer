<?php
namespace App;
use App\Project;
class Task
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_project', 'id_user', 'id_rol', 'name', 'description', 'state',
    ];

    public function project(){
      return $this->belongsTo(Project::class);
    }

    public function user(){
      return $this->belongsTo(Project::class);
    }
}
