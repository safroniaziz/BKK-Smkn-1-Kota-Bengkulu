<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsMitra
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
        if($request->user() && $request->user()->hakAkses == 'mitra'){
            return $next($request);
        }
        $notification = array(
            'message' => 'Gagal, anda tidak memiliki akses mitra!',
            'alert-type' => 'error'
        );
        return redirect()->route('login')->with($notification);
    }
}
