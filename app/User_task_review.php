<?php
namespace App;
class User_task_review
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'id_task', 'id_review',
    ];
}
