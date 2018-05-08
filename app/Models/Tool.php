<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tool extends Model
{
    public function projects() {
        return $this->belongsToMany(Project::class, 'project_tools', 'tool_id', 'project_id');
    }
}
