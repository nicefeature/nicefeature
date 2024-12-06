<?php

namespace App\Http\Controllers\Feedback\Board;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Inertia\Inertia;
use Inertia\Response;

class PublicBoardController extends Controller
{
    public function show(string $id): Response
    {
        $board = Board::findOrFail($id);

        // TODO: Inject feedback per board
        return Inertia::render('Feedback/Board/PublicBoard', [
            'board' => $board,
        ]);
    }
}
