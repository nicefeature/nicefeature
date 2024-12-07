<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PublicFeedbackController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'board_id' => 'required|uuid',
        ]);

        $board = Auth::user()->boards()
            ->where('id', $request->board_id)
            ->firstOrFail();

        Auth::user()->feedback()->create([
            'title' => $request->title,
            'description' => $request->description,
            'board_id' => $board->id,
        ]);

        return redirect()->back()->with('success', 'Feedback added');
    }

    public function show(): Response
    {
        // TODO: Inject all feedback
        return Inertia::render('Feedback/PublicFeedback');
    }
}
