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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    /*
     * My project ?
     */
    public static function ownProject($id)
    {
        $project = Project::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if (!$project) {
            throw new \Exception("Project not found!", 400);
        }
        return $project;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function points()
    {
        return $this->hasMany(ProjectPoint::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'project_tags', 'project_id', 'tag_id');
    }

    public function tools() {
        return $this->belongsToMany(Tool::class, 'project_tools', 'project_id', 'tool_id');
    }
}
