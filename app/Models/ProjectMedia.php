<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProjectMedia extends Model
{
    protected $table = "project_medias";
    protected $fillable = ['project_id', 'url'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
