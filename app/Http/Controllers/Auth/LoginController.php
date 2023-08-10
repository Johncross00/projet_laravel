<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        
        // Utiliser Validator pour valider les champs
        Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->usertype()->admin == 1) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('home');
            }
        } else {
            throw ValidationException::withMessages([
                'email' => 'Input propere email/password.'
            ]);
        }
    }
}
