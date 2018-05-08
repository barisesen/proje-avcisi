<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Project;
use App\Models\Tool;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $projects = Project::all()->count();
        $categories = Category::all()->count();
        $tools = Tool::all()->count();
        return view('admin.dashboard.index', compact('users', 'projects', 'categories', 'tools'));
    }
}
