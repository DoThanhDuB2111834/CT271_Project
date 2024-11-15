<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()) {
            if (!$request->user()?->isAdmin()) {
                return redirect()->intended('/')->with('message', 'You are not allowed to view this');
            }
        } else {
            return redirect('admin/login');
        }

        return $next($request);
    }
}
