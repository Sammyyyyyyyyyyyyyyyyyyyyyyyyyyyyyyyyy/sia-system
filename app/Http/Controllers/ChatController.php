<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    private array $allowedBlocks = [
        '3-A', '3-B', '3-C', '3-D', '3-E', '3-L'
    ];

   public function index(Request $request)
{
    $block = $request->query('block', '3-A');

    abort_unless(in_array($block, $this->allowedBlocks, true), 404);

    $messages = ChatMessage::with('user')
        ->where('user_id', Auth::id())
        ->where('block', $block)
        ->orderBy('created_at')
        ->get();

    return view('dashboard_layout.chat', compact('block', 'messages'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'block' => ['required', 'string', 'in:3-A,3-B,3-C,3-D,3-E,3-L'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    ChatMessage::create([
        'user_id' => Auth::id(),
        'block' => $validated['block'],
        'message' => $validated['message'],
    ]);

    return redirect()->route('chat.index', [
        'block' => $validated['block']
    ]);
}}
