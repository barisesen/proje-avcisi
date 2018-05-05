<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $projects = $tag->projects()->paginate(20);
        return view('tag.show', compact('projects', 'tag'));
    }
}
