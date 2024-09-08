<?php

namespace App\Http\Controllers;

use App\DTOs\User\ResetPasswordDTO;
use App\Http\Requests\password\ResetPasswordFormRequest;
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

        $status = Password::reset([
            'token' => $dto->token,
            'email' => $dto->email,
            'password' => $dto->password
            ], function ($user) use ($dto) {
                $user->forceFill([
                    'password' => bcrypt($dto->password),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login.create')->with('status', trans($status));
        }

        return back()->withInput($dto->email)->withErrors(['email' => trans($status)]);
    }
}
