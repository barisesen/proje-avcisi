<?php

namespace App;

use App\Models\Follow;
use App\Models\Like;
use App\Models\Project;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

}
