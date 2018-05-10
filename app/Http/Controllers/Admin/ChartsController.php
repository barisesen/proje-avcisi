<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Project;
use App\Models\Admin;
use App\User;
use App\Http\Controllers\Controller;

class ChartsController extends Controller
{
    public function user() {
        $userCount = User::all()->count();
        $adminCount = Admin::all()->count();
        return view('admin.charts.user', compact('userCount', 'adminCount'));
    }
    public function project() {
        $users = User::all();
        $projects = [];
        foreach ($users as $user) {
            $projects = array_push($projects,$user->projects);
        }
        return view('admin.charts.project', compact('user', 'projects'));
    }
}
