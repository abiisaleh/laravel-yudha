<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserPanelRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'pelanggan') {
            if (!in_array(url()->current(), [filament()->getLogoutUrl(), filament()->getProfileUrl()]))
                return redirect('user');
        } elseif (in_array(auth()->user()->role, ['teknisi', 'distributor'])) {
            return redirect('app');
        }

        return $next($request);
    }
}
