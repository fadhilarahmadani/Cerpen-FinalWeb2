<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function show()
    {
        return view('user.subscription');
    }

    public function subscribe(Request $request)
    {
        // Mengambil pengguna yang sedang login
        $user = Auth::user();
        // \Log::info($user);// Menggunakan Auth untuk mendapatkan pengguna yang sedang login

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to subscribe.');
        }

        $plan = $request->input('plan');

        // Validasi input
        $request->validate([
            'plan' => 'required|in:monthly,yearly',
        ]);

        // Simpan informasi langganan
        $subscription = new Subscription();
        $subscription->user_id = $user->id;
        $subscription->start_date = now();
        $subscription->end_date = $plan === 'monthly' ? now()->addMonth() : now()->addYear();
        $subscription->status = 'active';
        $subscription->save();

        // Update status premium di tabel users
        $user->is_premium = true;
        $user->save();

        return redirect()->route('user.story')->with('success', 'Subscription successful!');
    }
    
}