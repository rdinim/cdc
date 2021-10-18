<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        /* set only email and password as credentials */
        $credentials = $request->only('username', 'password');
        $md5 = md5($credentials['password']);
        $credentials['password'] = $md5;

        //mencari user dengan credential sesuai input
        $user= User::where('username','=',$credentials['username'])->first();
        dd($user->toArray());

        //cek apakah object ada isisnya (cek apakah credential yang dicari ada di model user)


        if (Auth::login($user)) { /* if credentials match */
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        /* if password doesn't match the username */
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
