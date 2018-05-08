<?php

namespace App;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Feed;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Project;
use App\Models\UserLink;
use App\Models\UserPoint;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ScoutElastic\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;
    protected $indexConfigurator = ProjectIndexConfigurator::class;
    /**
     * @var array
     */
    protected $searchRules = [
        //
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
            'username' => [
                'type' => 'string',
                'analyzer' => 'turkish'
            ],
            'first_name' => [
                'type' => 'string',
                'analyzer' => 'turkish'
            ],
            'last_name' => [
                'type' => 'string',
                'analyzer' => 'turkish'
            ],
            'email' => [
                'type' => 'string',
                'analyzer' => 'turkish'
            ]
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /*
     * Takip ettiklerim
     */
    public function followers() {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }


    /*
     * Takip edenler
     */
    public function following() {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'user_categories', 'user_id', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function points()
    {
        return $this->hasMany(UserPoint::class);
    }

    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }

    public function links()
    {
        return $this->hasMany(UserLink::class);
    }
}
