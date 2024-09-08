<?php

namespace App\Http\Controllers;

use App\DTOs\User\LoggedDTO;
use App\DTOs\User\RegisteredDTO;
use App\Http\Requests\Login\StoreFormRequest;
use App\Services\User\AuthService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }

    public function login(StoreFormRequest $request): RedirectResponse
    {
        $dto = LoggedDTO::fromRequest($request);
        if (Auth::attempt([
            'email' => $dto->email,
            'password' => $dto->password,
        ])) {
            session()->flash('success', 'Вы успешно вошли');
///TODO делать редирект на страницу со списком лидов
            return redirect()->route('home');
        } return redirect()->back()->with('error', 'Неправильный логин или пароль');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
