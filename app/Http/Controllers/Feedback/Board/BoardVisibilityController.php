<?php

namespace App\Http\Controllers\Feedback\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardVisibilityController extends Controller
{
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'isPublic' => 'required|boolean',
        ]);

        $board = Board::findOrFail($id);

        if ($board->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $board->is_public = $validated['isPublic'];
        $board->save();

        return redirect()->back()->with('success', 'Visibility updated successfully');
    }
}
