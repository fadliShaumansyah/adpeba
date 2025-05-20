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
        
        // Inbox: Messages received by current user
        $inboxMessages = Message::with('sender')
            ->where('receiver_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Outbox: Messages sent by current user
        $outboxMessages = Message::with('receiver')
            ->where('sender_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        $users = User::where('id', '!=', $user->id)->get();

        return view('message.index', compact('inboxMessages', 'outboxMessages', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'content' => 'required|string|max:500'
    ]);

    $message = Message::create($request->only('receiver_id', 'content') + [
        'sender_id' => auth()->id()
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

    public function reply(Request $request, Message $originalMessage)
{
    $request->validate([
        'content' => 'required|string|max:500',
        'receiver_id' => 'required|exists:users,id',
    ]);
   

    $reply = Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'content' => $request->content,
        'parent_id' => $originalMessage->id,
    ]);

   return redirect()->route('messages.show', $originalMessage);

}


}
