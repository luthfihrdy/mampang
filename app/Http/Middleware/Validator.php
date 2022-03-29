<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Validator
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
        //role id 1 untuk admin, 2 untuk validator, 3 untuk pegawai biasa
        if(auth()->user()->role_id == 2){
            return $next($request);
        }

        if(auth()->user()->role_id == 1){
            return redirect()->route('admin.dash');
        }

        if(auth()->user()->role_id == 3){
            return redirect()->route('pegawai.dash');
        }
        
        //return redirect('home')->with('error',"You don't have Validator access.");
    }
}
