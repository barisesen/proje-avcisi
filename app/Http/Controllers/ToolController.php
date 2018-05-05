<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function show($slug)
    {
        $tool = Tool::where('slug', $slug)->first();
        $projects = $tool->projects()->paginate(20);
        return view('tool.show', compact('projects', 'tool'));
    }
}
