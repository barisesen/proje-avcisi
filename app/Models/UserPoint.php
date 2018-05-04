<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
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
