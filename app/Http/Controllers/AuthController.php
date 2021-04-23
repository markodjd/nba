<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function get_register_form() {
        return view('forms.register');
    }

    public function register(RegisterRequest $request) {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect('/');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function get_login_form() {
        return view('forms.login');
    }

    public function login(Request $request) {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return view('forms.login', ['invalid_credentials' => true]);
    }
}
