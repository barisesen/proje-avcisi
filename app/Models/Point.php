<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
      'user_id', 'project_id', 'point', 'point_type_id'
    ];
}
