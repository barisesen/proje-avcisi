<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Point;
use App\Models\Project;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index()
    {
//        $user = Project::find(1);
//        dd($user->points->sum('point'));
        $project = Project::find(13);

        dd($project->tags);
        $tag = Tag::find(1);
        dd($tag->projects);

    }
}
