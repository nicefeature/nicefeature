<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PublicBoardController extends Controller
{
    public function show(string $id): Response
    {
        $board = Auth::user()->boards()->where('id', $id)->firstOrFail();

        return Inertia::render('Feedback/Board/PublicBoard', [
            'board' => $board,
        ]);
    }
}
