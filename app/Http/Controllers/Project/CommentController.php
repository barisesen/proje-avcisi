<?php

namespace App\Http\Controllers\Project;

use App\Jobs\AddProjectPoint;
use App\Jobs\AddUserPoint;
use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store($id, Request $request)
    {
        $request->validate([
            'content' => 'required|min:3',
        ]);
        $project = Project::findOrFail($id);

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->project_id = $id;
        $comment->content = $request->content;
        if ($comment->save()) {
            AddUserPoint::dispatch(auth()->user()->id, 'add_comment_user', $project->id);
            AddProjectPoint::dispatch($project->id, 'comment_project', auth()->user()->id);
            return response()->json([
                'message' => "Successful",
                'status' => 200
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'message' => 'Something went wrong!'
        ] ,400);
    }

    public function destroy($id)
    {
        $comment = Comment::where('user_id', auth()->user()->id)->where('id', $id);
        if ($comment->exists()) {
            if ($comment->delete()) {
                AddUserPoint::dispatch(auth()->user()->id, 'delete_comment_user', $comment->project->id);
                AddProjectPoint::dispatch($comment->project->id, 'delete_comment_project', auth()->user()->id);
                return response()->json([
                    'message' => 'Successful',
                    'status' => 200
                ], 200);
            }
        }
        return response()->json([
            'message' => 'Something went wrong',
            'status' => 400
        ], 400);
    }
}
