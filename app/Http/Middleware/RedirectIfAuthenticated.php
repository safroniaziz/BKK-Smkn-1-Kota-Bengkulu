<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                if (auth()->user()->hakAkses == "operator") {
                    $notification1 = array(
                        'message' => 'Berhasil, akun login sebagai operator!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('operator.dashboard')->with($notification1);;
                }elseif (auth()->user()->hakAkses == "alumni") {
                    $notification2 = array(
                        'message' => 'Berhasil, anda login sebagai alumni!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('alumni.dashboard')->with($notification2);;
                } elseif (auth()->user()->hakAkses == "mitra") {
                    $notification2 = array(
                        'message' => 'Berhasil, anda login sebagai mitra!',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('mitra.dashboard')->with($notification2);;
                } else {
                    Auth::logout();
                    $notification = array(
                        'message' => 'Gagal, akun anda tidak dikenali!',
                        'alert-type' => 'error'
                    );
                    return redirect()->route('login')->with($notification);
                }
            }
        }

        return $next($request);
    }
}
