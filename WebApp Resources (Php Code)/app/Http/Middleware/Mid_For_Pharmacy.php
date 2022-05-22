<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Admin;

class Mid_For_Pharmacy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!Auth::guard('pharmacist')->check()) 
        {
            // dd(' NOT logined');
            // dd(Auth::user());
            // dd(auth());
            return redirect()->route('pharmacy_sign_in');
           
        }
        
        return $next($request);

    }
}
