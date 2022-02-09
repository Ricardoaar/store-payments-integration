<?php

namespace App\Http\Middleware;

use App\Constants\UserRoles;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminAccess
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

        $user = $request->user();
        if ($user->isAdmin()) {
            return $next($request);
        }

        switch ($user->role) {
            case UserRoles::USER:
                return redirect()->route('user.orders');
            default:
                return redirect()->route('home');
        }


    }
}
