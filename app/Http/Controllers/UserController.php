<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function togglePremiumStatus()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Toggle the user's is_premium status
        $user->is_premium = !$user->is_premium;

        // Save changes
        if ($user->save()) {
            $status = $user->is_premium ? 'premium' : 'not premium';
            return redirect()->back()->with('success', "User status updated to $status.");
        } else {
            return redirect()->back()->with('error', 'Failed to update user status.');
        }
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // public function showUserName()


}

