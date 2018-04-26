<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'category_id', 'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
