<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MessageController extends Controller
{
    
   public function index()
{
    $messages = Message::with(['sender', 'receiver'])
        ->where('sender_id', auth()->id())
        ->orWhere('receiver_id', auth()->id())
        ->orderBy('created_at', 'desc')
        ->get();

    $users = User::where('id', '!=', auth()->id())->get();

    return view('message.index', compact('messages', 'users'));
}

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        return back();
    }
}
