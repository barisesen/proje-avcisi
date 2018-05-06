<?php

namespace App\Http\Controllers\Follow;

use App\Jobs\AddNotification;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric'
        ]);
        $follow = new Follow();
        $follow->user_id = $request->user_id;
        $follow->follower_id = auth()->user()->id;
        if ($follow->save()) {
            AddNotification::dispatch(auth()->user()->id, $request->user_id, 'Seni takip etmeye başladı.', null);
            return response()->json([
                'status' => 200,
                'message' => 'Successful'
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'message' => 'Something went wrong'
        ], 400);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric'
        ]);

        $follow = Follow::where('user_id', $request->user_id)->where('follower_id', auth()->user()->id);
        if ($follow->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Successful'
            ], 200);
        }
        return response()->json([
            'status' => 400,
            'message' => 'Something went wrong'
        ], 400);
    }
}
