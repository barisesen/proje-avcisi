<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMedia extends Model
{
    protected $table = "project_medias";
    protected $fillable = ['project_id', 'url'];
}
