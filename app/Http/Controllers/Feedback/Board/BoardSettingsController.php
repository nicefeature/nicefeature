<?php

namespace App\Http\Controllers\Feedback\Board;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class BoardSettingsController extends Controller
{
    public function show(string $id): Response
    {
        $board = Auth::user()->boards()->where('id', $id)->firstOrFail();

        return Inertia::render('Feedback/Board/Settings/BoardSettings', [
            'board' => $board,
        ]);
    }
}
