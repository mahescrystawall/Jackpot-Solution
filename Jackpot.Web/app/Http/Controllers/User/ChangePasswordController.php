<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('change-password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Dummy User Data for Testing
        $user = [
            'username' => 'test_user',
            'password' => Hash::make('password123'), // Dummy current password
        ];
        dd($user);

        // Verify Current Password
        if (!Hash::check($request->current_password, $user['password'])) {
            return back()->with('error', 'Current password is incorrect!');
        }

        // Update Password
        $user['password'] = Hash::make($request->new_password);

        return back()->with('success', 'Password changed successfully!');
    }
}
