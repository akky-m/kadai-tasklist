<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        // 未ログインならreturn redirectを実行
        if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }

        // 次のミドルウェアに処理を移譲
        return $next($request);
    }
}
