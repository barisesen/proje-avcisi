<?php

namespace App\Http\Controllers\Project;

use App\Models\Like;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function store($id)
    {
        $project = Project::findOrFail($id);
        /*
         * did you like it before
         */
        if (Like::where('user_id', auth()->user()->id)->where('project_id', $id)->exists()) {
            return response()->json([
                'message' => 'Already liked!'
            ], 400);
        }
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->project_id = $project->id;

        if ($like->save()) {
            return response()->json([
                'message' => 'Successful'
            ], 200);
        }
        return response()->json([
            'message' => 'something went wrong!'
        ], 500);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if (!Like::where('user_id', auth()->user()->id)->where('project_id', $id)->exists()) {
            return response()->json([
                'message' => 'Do not like it anyway!'
            ], 400);
        }
        $like = Like::where('project_id', $id)->where('user_id', auth()->user()->id)->delete();
        if ($like) {
            return response()->json([
                'message' => 'Successful'
            ], 200);
        }
        return response()->json([
            'message' => 'something went wrong!'
        ], 500);
    }
}
