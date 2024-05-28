<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            if (request()->segment(1) == 'adminPanel') {
                return route('adminPanel.login');
            } else {
                return route('login');
            }
        }else{
            return null;
        }
    }
}
