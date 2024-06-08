<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    public function showResetForm($token)
    {
        if (strpos($token, '::') === false) {
            return redirect()->route('loginView')->withErrors(['email' => 'Invalid token']);
        }

        list($token, $email) = explode('::', $token);

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('loginView')->withErrors(['email' => 'Email not found']);
        }

        if (!Password::tokenExists($user, $token)) {
            return redirect()->route('loginView')->withErrors(['email' => 'Invalid token or email']);
        }

        return view('auth.password.reset', ['token' => $token, 'email' => $email]);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Password::createToken($user);
            $token .= '::' . $request->email;

            Mail::to($request->email)->send(new ResetPasswordEmail($token));

            return back()->with('status', 'Reset password link sent!');
        }

        return back()->withErrors(['email' => 'User not found']);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Password::tokenExists($user, $request->token)) {
            return redirect()->route('loginView')->withErrors(['email' => 'Invalid token or email']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('loginView')->with('status', 'Password reset successful!');
    }
}
