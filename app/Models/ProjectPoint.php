<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPoint extends Model
{
    protected $fillable = ['user_id', 'project_id', 'point', 'point_type_id'];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function project()
    {
        $this->belongsTo(Project::class);
    }
}
