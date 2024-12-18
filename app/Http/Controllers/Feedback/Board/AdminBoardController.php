<?php

namespace App\Http\Controllers\Feedback\Board;

use App\Http\Controllers\Controller;
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
            'feedback' => $board->feedback,
        ]);
    }

    public function store(): RedirectResponse
    {
        $lastBoard = Auth::user()->boards()->orderByDesc('order')->first();
        $newOrder = $lastBoard ? $lastBoard->order + 1 : 1;

        $board = Auth::user()->boards()->create([
            'title' => null,
            'description' => null,
            'emoji' => null,
            'is_public' => false,
            'order' => $newOrder,
        ]);

        return Redirect::route('admin.board.show', ['id' => $board->id]);
    }

    public function delete(string $id): RedirectResponse
    {
        $board = Auth::user()->boards()->where('id', $id)->firstOrFail();
        $board->deleteOrFail();

        return Redirect::route('admin.feedback');
    }
}
