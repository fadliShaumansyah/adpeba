<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function toggle(Post $post)
    {
        $user = Auth::user();
        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
        } else {
            $post->likes()->create(['user_id' => $user->id]);
        }

        return back();
    }
}
