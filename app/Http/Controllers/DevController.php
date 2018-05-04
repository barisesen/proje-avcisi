<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\User;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index()
    {
        $user = User::find(1);
//        dd($user->categories);
        $category = Category::find(2);
        dd($category->users);
    }
}
