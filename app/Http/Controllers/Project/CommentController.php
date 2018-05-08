<?php

namespace App\Http\Controllers\Project;

use App\Jobs\AddFeed;
use App\Jobs\AddNotification;
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
            AddNotification::dispatch(auth()->user()->id, $project->user_id, 'Yeni bir yorum ateşledi!', $project->id);
            AddUserPoint::dispatch(auth()->user()->id, 'add_comment_user', $project->id);
            AddProjectPoint::dispatch($project->id, 'add_comment_project', auth()->user()->id);
            AddFeed::dispatch($id, auth()->user()->id, 'Yorum Yaptı');

            return back();
        }
        return back();
    }

    public function destroy($id)
    {
        $comment = Comment::where('user_id', auth()->user()->id)->where('id', $id);
        if ($comment->exists()) {
            if ($comment->delete()) {
                AddUserPoint::dispatch(auth()->user()->id, 'delete_comment_user', $comment->project->id);
                AddProjectPoint::dispatch($comment->project->id, 'delete_comment_project', auth()->user()->id);
                return back();
            }
        }
        return back();
    }
}
