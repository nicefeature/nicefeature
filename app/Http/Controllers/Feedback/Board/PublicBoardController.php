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
        // TODO: There is no Auth in public, change this. In OS Version we can fetch all boards.
        $board = Board::findOrFail($id);

        return Inertia::render('Feedback/Board/PublicBoard', [
            'board' => $board,
        ]);
    }
}