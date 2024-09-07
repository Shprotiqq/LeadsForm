<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function create()
    {

        return view('user.register');

    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|max:35',
        ];

        $messages = [
          'name.required' => 'Поле "имя" обязательно для заполнения',
          'email.required' => 'Поле "e-mail" обязательно для заполнения',
          'email.email' => 'Поле "e-mail" должно включать в себя почту',
          'email.unique' => 'Пользователь с такой почтой уже зарегестрирован',
          'password.required' => 'Поле "пароль" обязательно для заполнения',
          'password.confirmed' => 'Пароли должны совпадать',
          'password.min' => 'Пароль должен содержать минмимум 5 символов',
          'password.max' => 'Пароль должен содержать максимум 35 символов',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        session()->flash('success', 'Вы успешно зарегистрировались');
        Auth::login($user);
        return redirect()->route('home');

    }

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
