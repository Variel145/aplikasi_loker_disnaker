<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    // Mengarahkan user ke halaman login Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Menangani callback dari Google setelah user login
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Cari user berdasarkan google_id atau email
            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                // Jika user sudah ada, update google_id (jika belum ada) dan login
                $user->update(['google_id' => $googleUser->id]);
                Auth::login($user);
            } else {
                // Jika user belum ada, buat user baru
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt('123456dummy') // Password dummy
                ]);
                Auth::login($newUser);
            }

            return redirect()->intended('/dashboard'); // Arahkan ke dashboard/home
            
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login dengan Google');
        }
    }
}