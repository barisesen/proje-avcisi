<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartsController extends Controller
{
    public function user() {
        return view('admin.charts.user');
    }
    public function project() {
        return view('admin.charts.project');
    }
    public function tool() {
        return view('admin.charts.tool');

    }
}
