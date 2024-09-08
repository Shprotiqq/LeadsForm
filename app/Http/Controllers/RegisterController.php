<?php

namespace App\Http\Controllers;

use App\DTOs\User\RegisteredDTO;
use App\Http\Requests\Register\StoreFormRequest;
use App\Services\User\AuthService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.register');
    }

    public function store(StoreFormRequest $request): RedirectResponse
    {
        $dto = RegisteredDTO::fromRequest($request);
        $user = AuthService::registered($dto);

        event(new Registered($user));

        session()->flash('success', 'Вы успешно зарегистрировались');

        Auth::login($user);

        return redirect()->route('home');
    }

}
