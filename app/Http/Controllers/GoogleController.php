<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect user ke Google OAuth
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Google OAuth Callback
     * Handle user registration/login via Google
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Find atau create user
            $user = User::where('google_id', $googleUser->getId())->first();

            if ($user) {
                // User sudah ada, hanya update info
                $user->update([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                ]);
            } else {
                // User baru - create dengan default role
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'password' => bcrypt(uniqid()), // Random password (tidak dipakai)
                    'role' => 'pencari_kerja',      // ← DEFAULT ROLE UNTUK USER BARU
                    'age_confirmed' => false,
                ]);

                \Log::info('New user created via Google OAuth', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'role' => $user->role,
                ]);
            }

            // Login user
            auth()->login($user, remember: true);

            // Redirect berdasarkan role
            if ($user->isAdmin()) {
                return redirect('/admin/dashboard')->with('success', 'Welcome Admin! ' . $user->name);
            } else {
                return redirect('/dashboard')->with('success', 'Welcome, ' . $user->name);
            }

        } catch (\Exception $e) {
            \Log::error('Google OAuth error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect('/')->with('error', 'Google login failed. Please try again.');
        }
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        auth()->logout();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        \Log::info('User logged out', [
            'user_id' => auth()->id(),
            'timestamp' => now(),
        ]);

        return redirect('/')->with('success', 'Logged out successfully');
    }
}