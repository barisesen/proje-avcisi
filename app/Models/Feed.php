<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = ['project_id', 'user_id', 'event'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
