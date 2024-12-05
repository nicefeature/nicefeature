<?php

namespace App\Http\Controllers\Feedback\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardDescriptionController extends Controller
{
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'description' => 'nullable|string|max:255',
        ]);

        $board = Board::findOrFail($id);

        if ($board->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($validated['description'] === $board->description) {
            return;
        }

        $board->description = $validated['description'];
        $board->save();

        return redirect()->back()->with('success', 'Description updated successfully');
    }
}
