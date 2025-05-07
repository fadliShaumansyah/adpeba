<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Suport\Facades\Auth;
use Illuminate\Support\Storage;

class PostController extends Controller
{
    //menampilkan semua post
public function index(){
    $posts=Post::with(['user','comments.user','likes'])->latest()->get();
    return response()->json($posts);
}
//menyimpan postingan baru
public function store(Requeat $request){
    $request->validate([
        'content'=>'nullable|string',
        'image'=>'nullable|image|max:2048',
    ]);

    $path = null;
    if ($request->hasFile('image')){
        $path = $request->file('image')->store('images','public');
    }

    $post = Post::create([
        'user_id'=> Auth::id(),
        'content'=> $request->content,
        'image'=> $path,
    ]);

    return response()->json($post, 201);
}
        //menghapus postingan
        public function destroy(Post $post){
            if ($post->user_id !== Auth::id()){
                return response()->json(['error'=>'Unauthorized'],403);
            }
            if ($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $post->delete();

            return response()->json(['massage'=>'Post deleted']);
        }
}
