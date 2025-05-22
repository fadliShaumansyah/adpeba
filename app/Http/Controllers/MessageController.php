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
        $user = auth()->user();
        
        // Get all messages where user is either sender or receiver
        $messages = Message::with(['sender', 'receiver', 'replies.sender'])
            ->where(function($query) use ($user) {
                $query->where('sender_id', $user->id)
                      ->orWhere('receiver_id', $user->id);
            })
            ->whereNull('parent_id') // Only get parent messages
            ->orderBy('created_at', 'desc')
            ->get();
            
        $users = User::where('id', '!=', $user->id)->get();

        return view('message.index', compact('messages', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:500'
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
            'parent_id' => null // Explicitly set parent_id as null for new messages
        ]);

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    public function show(Message $message)
    {
       // Pastikan user hanya bisa melihat pesan yang terkait dengannya
    if ($message->sender_id !== auth()->id() && $message->receiver_id !== auth()->id()) {
        abort(403);
    }

    // Tandai sebagai dibaca jika penerima
    if ($message->receiver_id === auth()->id() && !$message->read_at) {
        $message->update(['read_at' => now()]);
    }

    // Load relasi sender, receiver, replies, dan sender pada replies
    $message->load('sender', 'receiver', 'replies.sender');

    return view('message.msshow', [
        'message' => $message,
        'replyTo' => $message
    ]);
    }

    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'receiver_id' => 'required|exists:users,id',
        ]);

        // Jika ini adalah balasan untuk pesan yang sudah memiliki parent
        $rootMessage = $message->parent_id ? $message->originalMessage : $message;

        $reply = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
            'parent_id' => $rootMessage->id
        ]);

        return redirect()->route('messages.show', $rootMessage);
    }

}
