<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        $userRole = auth()->user()->role;

        // Admin (IT) can access everything
        if ($userRole === 'admin') {
            return $next($request);
        }

        // Check if user has one of the allowed roles
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}