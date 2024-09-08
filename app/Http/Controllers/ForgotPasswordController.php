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

        if ($status === Password::RESET_LINK_SENT && auth()->guest()) {
            session()->flash('success', 'Ссылка отправлена на почту');
            return redirect()->route('login.create');
        } elseif ($status === Password::PASSWORD_RESET && auth()->user()) {
            session()->flash('success', 'Ссылка отправлена на почту');
            return redirect()->route('profile');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($status)]);

    }


}
