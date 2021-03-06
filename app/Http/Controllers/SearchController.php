<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $projects = Project::search($request->q)->with('likes', 'comments', 'category', 'tags')->orderBy('point', 'desc')->paginate(20);
            if (!isset($projects[0])) {
                $projects = Project::where('title', "{$request->q}%")->paginate(20);
            }
            $q = $request->q;
            return view('search', compact('projects', 'q'));
        }
        return back();
    }
}
