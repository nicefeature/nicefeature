<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class AdminFeedbackController extends Controller
{
    public function show(): Response
    {
        // TODO: Inject all feedback
        return Inertia::render('Feedback/AdminFeedback');
    }
}
