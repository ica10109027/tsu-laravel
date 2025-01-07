<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PembeliMiddleware
{
    public function handle($request, Closure $next)
    {
        // Periksa apakah pengguna adalah pembeli (role = 0)
        if (Auth::check()) {
            if (Auth::user()->role == 1){
                return $next($request);
            }
            return response()->view('errors.custom', ['message' => 'Anda Bukan Admin'], 403);
        }
        return redirect('/');
        
        // Jika bukan admin, arahkan ke halaman lain
         // Ganti dengan kode status atau rute yang sesuai
    }
}
