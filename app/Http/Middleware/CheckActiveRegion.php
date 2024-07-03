<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckActiveRegion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Kiểm tra nếu người dùng đã đăng nhập và vùng active của họ không có ID là 1
        if ($user && $user->activeRegion && $user->activeRegion->id != 1) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Tài khoản của bạn chưa được cấp phép khi truy cập vào trang website']);
        }

        return $next($request);
    }
}
