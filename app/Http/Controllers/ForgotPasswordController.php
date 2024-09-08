<?php

namespace App\Http\Controllers;

use App\Http\Requests\password\ForgotPasswordFormRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.forgot-password');
    }

    public function store(ForgotPasswordFormRequest $request): RedirectResponse
    {
        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', 'Вы успешно зарегистрировались');
            return redirect()->route('login.create');

        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($status)]);

    }


}
