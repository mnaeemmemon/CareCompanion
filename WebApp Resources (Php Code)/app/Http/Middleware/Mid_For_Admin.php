<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\Admin;

class Mid_For_Admin
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
        if (!Auth::guard('admin')->check()) 
        {
            // dd(' NOT logined');
            // dd(Auth::user());
            // dd(auth());
            return redirect()->route('adminlogin');
           
        }

        return $next($request);
        // dd( Auth::check());

        // dd(Admin::find(Auth::guard('admin')->user()->id));
        // $id= Auth::guard('admin')->user()->id;
        // $admin = Admin::find($id);
        // dd($admin);


        // $role = Admin::find(Auth::guard('admin')->user()->id)->role;
        // dd($role);

        // if(Auth::guard('admin')->user()->role == 2)   //2 for admin
        // {
        //     // dd('yes');
        //     return $next($request);
        // }
        // else
        // {
        //     // dd('no');
        //     return redirect()->route('login');
        // }


        
    }
}
