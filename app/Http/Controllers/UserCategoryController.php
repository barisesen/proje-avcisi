<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function store($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $follow = new UserCategory();
        $follow->user_id = auth()->user()->id;
        $follow->category_id = $category->id;
        $follow->save();

        return back();
    }
}
