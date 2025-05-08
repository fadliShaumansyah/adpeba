<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth; // Perbaikan: 'Suport' → 'Support'
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::with(['user', 'comments.user', 'likes'])->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Menampilkan form untuk membuat post baru (opsional)
    public function create()
    {
        return view('posts.createpost');
    }

    // Menyimpan postingan baru
    public function store(Request $request) // Perbaikan: 'Requeat' → 'Request'
    {
        
        $request->validate([
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            
        }

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'image' => $path,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    // Menghapus postingan
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action.');
        }

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
