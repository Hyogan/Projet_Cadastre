<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.liste_messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contenu' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->route('home')->with('success', 'Message envoyé avec succès');
    }

    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->route('message.index')->with('success', 'Message supprimé avec succès');
    }
}
