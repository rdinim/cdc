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

        //mencari user dengan credential sesuai input
        
        $user = User::where('username','=',$credentials['username'])
            ->first();

        if (! empty($user)) {
            $password = md5(md5($credentials['password'].$user->salt).$user->salt);

            if ($user->password == $password) {
                Auth::login($user);
        
                $request->session()->regenerate();
        
                return redirect()->intended(route('dashboard'));
    
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);


        //cek apakah object ada isisnya (cek apakah credential yang dicari ada di model user)

        
    }
}
