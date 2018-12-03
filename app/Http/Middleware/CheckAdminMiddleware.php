<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $user = User::where('id', $id)->with('roles')->first();
            $role_id = $user->roles->first()->id;

            if ($role_id == config('setting.role_id')) {
                return $next($request);
            }
        }

        return redirect()->action('Admin\LoginController@index');
    }
}
