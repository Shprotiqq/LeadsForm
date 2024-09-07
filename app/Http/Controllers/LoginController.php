<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginForm()
    {

        return view('user.login');

    }

    public function login(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $messages = [
            'email.required' => 'Поле "e-mail" обязательно для заполнения',
            'email.email' => 'Поле "e-mail" должно включать в себя почту',
            'password.required' => 'Поле "пароль" обязательно для заполнения',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Вы успешно вошли');
//            делать редирект на страницу со списком лидов
            return redirect()->route('home');
        } return redirect()->back()->with('error', 'Неправильный логин или пароль');

    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('home');

    }
}
