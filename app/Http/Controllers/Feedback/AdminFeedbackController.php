<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Inertia\Inertia;
use Inertia\Response;

class AdminFeedbackController extends Controller
{
    public function show(): Response
    {
        $feedback = Feedback::all();

        return Inertia::render('Feedback/AdminFeedback', [
            'feedback' => $feedback
        ]);
    }
}
