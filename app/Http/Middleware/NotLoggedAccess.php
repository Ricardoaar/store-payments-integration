<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRoles;

class NotLoggedAccess
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (!$user) {
            return $next($request);
        }

        switch ($user->role->description) {
            case UserRoles::ADMIN:
                return redirect()->route('admin.orders');
            case UserRoles::USER:
                return redirect()->route('user.orders');
            default:
                return redirect('/not-found');
        }

    }
}
