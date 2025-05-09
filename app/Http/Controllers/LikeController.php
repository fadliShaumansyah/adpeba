<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeController extends Controller
{
    //
    public function toggle(Post $post)
    {
       $user = auth()->user();

    // Cek apakah user sudah like
    if ($post->likes()->where('user_id', $user->id)->exists()) {
        $post->likes()->where('user_id', $user->id)->delete();
    } else {
        $post->likes()->create(['user_id' => $user->id]);
    }

    return response()->json([
        'likes_count' => $post->likes()->count(),
    ]);
    }
}
