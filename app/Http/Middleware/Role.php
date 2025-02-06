<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {

        $userRole = $request->user()->role;
        if ($userRole === 'user' && $userRole !== 'user') {
            return redirect('/user');
        }elseif($userRole === 'admin' && $userRole === 'user'){
            return redirect('/admin/dashboard');
        }
        elseif($userRole === 'merchant' && $userRole === 'user'){
            return redirect('/merchant/dashboard');
        }
        elseif($userRole === 'admin' && $userRole === 'merchant'){
            return redirect('/admin/dashboard');
        }
        elseif($userRole === 'merchant' && $userRole === 'admin'){
            return redirect('/merchant/dashboard');
        }
        return $next($request);
    }
}
