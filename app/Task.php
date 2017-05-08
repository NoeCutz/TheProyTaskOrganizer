<?php
namespace App;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_project', 'id_user', 'id_rol', 'name', 'description', 'state'];

    public function project(){
      return $this->belongsTo(Project::class);
    }

    public function user(){
      return $this->belongsTo(Project::class);
    }

    public function role(){
        return $this->hasOne(Role::class);
    }
}
