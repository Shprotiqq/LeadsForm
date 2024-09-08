<?php

namespace App\Http\Controllers;

use App\DTOs\User\ResetPasswordDTO;
use App\Http\Requests\password\ResetPasswordFormRequest;
use App\Services\User\AuthService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    public function create(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    public function store(ResetPasswordFormRequest $request): RedirectResponse
    {
        $dto = ResetPasswordDTO::fromRequest($request);

        $status = AuthService::changePassword($dto);

        if ($status === Password::PASSWORD_RESET && auth()->guest()) {
            session()->flash('success', 'Пароль успешно изменен');
            return redirect()->route('login.create');
        } elseif ($status === Password::PASSWORD_RESET && auth()->user()) {
            session()->flash('success', 'Пароль успешно изменен');
            return redirect()->route('profile');
        }

        return back()->withInput(['email' => $dto->email])->withErrors(['email' => trans($status)]);
    }
}
