<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        /* set only email and password as credentials */
        $credentials = $request->only('username', 'password');

        // mencari user dengan jenis admin/taruna dengan credential sesuai input
        $user = User::where('username','=',$credentials['username'])
            //define approval pengguna di .env, dan membuat file login.php di config
            ->whereIn('approval_pengguna', config('login.approval_pengguna')) //  ->whereIn('approval_pengguna', ['1','100'])
            ->first();
        // dd($user->toArray());

        if (empty($user)) {
            return back()->withErrors(['bukan alumni bukan admin']);
        }
        
        // jika user bukan alumni
        if ($user->approval_pengguna =='100' && $user->graduate->id_jns_keluar != '1') {
            return back()->withErrors(['bukan alumni']);
        }

        //cek credential
        // $password = md5($credentials['password']);
        $password = $credentials['password'];


        // jika password salah
        if ($user->password !== $password) {
            return back()->withErrors(['credentials not match']);
        }

        Auth::login($user);

        $request->session()->regenerate();
        return Redirect::to(FacadesSession::get('url.intended'));

        // return redirect()->intended(route('dashboard'));
                
    }
}
