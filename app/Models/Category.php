<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'color'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_categories', 'category_id', 'user_id');
    }
}
