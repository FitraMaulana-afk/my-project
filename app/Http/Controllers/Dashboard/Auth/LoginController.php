<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Dashboard\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public string $loginView = 'dashboard.auth.';

    public function showLoginForm()
    {
        $loginView = $this->loginView;

        return \view($loginView . 'login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return \redirect()->intended(RouteServiceProvider::DASHBOARD);
        } else {
            return \redirect()->back();
        }
    }

    public function logout()
    {
        \auth()->logout();

        return \to_route('dashboard.login');
    }
}
