<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectLink extends Model
{
    protected $fillable = ['project_id', 'name', 'url', 'icon'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
