<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserActive
{
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if(is_user_active()) {
            return $next($request);
        }
        return Auth::check()
            ? redirect()->route('verification.notice')
            :  redirect()->route('login');
    }
}
