<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    public function handle(Request $request, Closure $next)
    {
        //jika akun yang login sesuai dengan role 
        //maka silahkan akses
        //jika tidak sesuai akan diarahkan ke home

        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $role) {
            $user = auth()->user()->role;
            if ($user == $role) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
