<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Models\ProjectTool;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $following_categories = auth()->user()->categories->pluck('id');
        $projects = Project::with('likes', 'category', 'tags', 'tools', 'comments')->whereIn('category_id', $following_categories)
            ->orderBy('projects.point', 'Desc')
            ->paginate();

        return view('home', compact('projects'));
    }
}
