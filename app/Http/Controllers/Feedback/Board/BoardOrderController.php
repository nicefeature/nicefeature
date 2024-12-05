<?php

namespace App\Http\Controllers\Feedback\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Auth;
use Illuminate\Http\Request;

class BoardOrderController extends Controller
{
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'boardIds' => 'required|array',
            'boardIds.*' => 'uuid',
        ]);

        $boardIds = $validatedData['boardIds'];

        foreach ($boardIds as $index => $boardId) {
            $board = Board::findOrFail($boardId);

            if ($board->user_id !== auth()->id()) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }

            $board->order = $index+1;
            $board->save();
        }

        return redirect()->back()->with('success', 'Order updated successfully');
    }
}
