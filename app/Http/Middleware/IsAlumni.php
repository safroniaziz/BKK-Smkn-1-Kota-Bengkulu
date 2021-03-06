<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAlumni
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
        if($request->user() && $request->user()->hakAkses == 'alumni'){
            return $next($request);
        }
        $notification = array(
            'message' => 'Gagal, anda tidak memiliki akses alumni!',
            'alert-type' => 'error'
        );
        return redirect()->route('login')->with($notification);
    }
}
