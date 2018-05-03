<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = "followers";

    protected $fillable = ["user_id", "follower_id"];
}
