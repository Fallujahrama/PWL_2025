<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.login'); // Sesuaikan dengan nama file tampilan login kamu
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Ambil user yang sedang login
            $user = Auth::user();

            // Arahkan sesuai level_kode
            switch ($user->level_kode) {
                case 'ADM': // Administrator
                    return redirect()->route('dashboard.admin');
                case 'MNG': // Manajer
                    return redirect()->route('dashboard.manager');
                case 'STF': // Staff/Kasir
                    return redirect()->route('dashboard.staff');
                case 'CUS': // Pelanggan
                    return redirect()->route('dashboard.customer');
                default:
                    return redirect('/'); // Default jika level tidak dikenali
            }
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors(['username' => 'Username atau password salah'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Arahkan ke halaman login setelah logout
    }
}
