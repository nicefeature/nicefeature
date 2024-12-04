<?php

namespace App\Http\Middleware;

use App\Models\Board;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $props = [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'boards' => Board::select('id', 'title', 'emoji')
                ->where('is_public', true)
                ->orderBy('order', 'asc')
                ->get(),
        ];

        // TODO: Only allow for "admin" or similar roles
        if ($request->user()) {
            $props['allBoards'] = Board::select('id', 'title', 'emoji', 'is_public')
                ->orderBy('order', 'asc')
                ->get();
        }

        return $props;
    }
}
