<?php

namespace App\Http\Controllers\Feedback\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardTitleController extends Controller
{
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
        ]);

        $board = Board::findOrFail($id);

        if ($board->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($validated['title'] === $board->title) {
            return;
        }

        $board->title = $validated['title'];
        $board->save();

        return redirect()->back()->with('success', 'Description updated successfully');
    }
}
