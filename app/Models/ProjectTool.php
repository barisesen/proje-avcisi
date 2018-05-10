<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectTool extends Model
{
    public function scopePopulars($query)
    {
        return $query
            ->select('*', DB::raw('count(id) as count'))
            ->groupBy('project_tools.tool_id')
            ->having('count', '>', 0)
            ->orderBy('count', 'desc');
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
