<?php

namespace Modules\Admin\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->guest() && !$this->shouldPassThrough($request)) {
            //return redirect()->guest(route('login'));
            if ($request->ajax() || $request->wantsJson()) {
                return response('非法用户！.', 401);
            } else {
                return redirect()->guest(route('login'));
            }
        }

        if(Auth::guard('admin')->user()->hasRole('admin')){
            return $next($request);
        }

        if(!Auth::guard('admin')->user()->can(Route::currentRouteName()) && Route::currentRouteName()!='admin.home') {
            return response('您没有权限执行当前操作', 401);
        }

        return $next($request);
    }

    /**
     * Determine if the request has a URI that should pass through verification.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function shouldPassThrough($request)
    {
        $excepts = [
            '*admin/auth/login',
        ];

        foreach ($excepts as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }
}
