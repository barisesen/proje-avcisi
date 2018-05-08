<?php

namespace App\Models;

use App\ProjectIndexConfigurator;
use App\ProjectSearchRule;
use App\User;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Project extends Model
{
    use Searchable;
    protected $indexConfigurator = ProjectIndexConfigurator::class;
    /**
     * @var array
     */
    protected $searchRules = [
        ProjectSearchRule::class
    ];

    /**
     * @var array
     */
    protected $mapping = [
        'properties' => [
            'id' => [
                'type' => 'integer',
                'index' => 'not_analyzed'
            ],
            'title' => [
                'type' => 'string',
                'analyzer' => 'turkish'
            ],
            'content' => [
                'type' => 'string',
                'analyzer' => 'turkish'
            ],
            'user_id' => [
                'type' => 'integer',
                'index' => 'not_analyzed'
            ],
            'category_id' => [
                'type' => 'integer',
                'index' => 'not_analyzed'
            ],
            'point' => [
                'type' => 'integer',
                'index' => 'not_analyzed'
            ],
            'user_username' => [
                'type' => 'string',
                'index' => 'not_analyzed'
            ],
            'category_name' => [
                'type' => 'string',
                'index' => 'not_analyzed'
            ],
            'tag_names' => [
                'type' => 'string',
                'index' => 'not_analyzed'
            ],
            'tool_names' => [
                'type' => 'string',
                'index' => 'not_analyzed'
            ],
            'comment_contents' => [
                'type' => 'string',
                'index' => 'not_analyzed'
            ]

        ]
    ];

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

    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        // Customize array...
        return array_merge($array, [
            'user_username' => $this->user->username,
            'category_name' => $this->category->name,
            'tags' => $this->tags()->pluck('name'),
            'tools' => $this->tools()->pluck('name'),
            'comment_contents' => $this->comments()->pluck('content')
        ]);
    }

    public function medias()
    {
        return $this->hasMany(ProjectMedia::class);
    }
}
