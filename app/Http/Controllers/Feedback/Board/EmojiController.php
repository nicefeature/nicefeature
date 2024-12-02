<?php

namespace App\Http\Controllers\Feedback\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class EmojiController extends Controller
{
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'emoji' => 'nullable|string|max:255',
        ]);

        $board = Board::findOrFail($id);

        if ($board->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $board->emoji = $validated['emoji'];
        $board->save();

        return response()->json([
            'message' => 'Emoji updated successfully',
            'board' => $board,
        ]);
    }
}
