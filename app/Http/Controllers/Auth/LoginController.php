<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	use AuthenticatesUsers;

    protected $redirectTo = '/home';

	public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
	
    protected function authenticated(Request $request, $user)
{
    if (is_null($user->email_verified_at)) {
        Auth::logout();

        return redirect('/login')->withErrors([
            'email' => 'Turite patvirtinti savo el. pašto adresą prieš prisijungdami.',
        ]);
    }
}
    
}

