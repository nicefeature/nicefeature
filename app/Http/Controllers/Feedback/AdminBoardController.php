<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class AdminBoardController extends Controller
{
    public function show(string $id): Response
    {
        $board = Auth::user()->boards()->where('id', $id)->firstOrFail();

        return Inertia::render('Feedback/Board/AdminBoard', [
            'board' => $board,
        ]);
    }

    public function store(): RedirectResponse
    {
        $board = Auth::user()->boards()->create([
            'title' => null,
            'description' => null,
        ]);

        return Redirect::route('admin.board.show', ['id' => $board->id]);
    }
}
