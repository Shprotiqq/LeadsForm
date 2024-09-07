@extends('layouts.layout')

@section('content')

<main class="form-signin w-100 m-auto">

    <form method="POST">

        @csrf

        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name">
            <label for="name">Ваше имя</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email">
            <label for="email">Ваш e-mail</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password">
            <label for="password">Ваш пароль</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            <label for="password_confirmation">Подтвердите Ваш пароль</label>
        </div>

        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Зарегистрироваться</button>
    </form>
    <div class="mt-3">
        <p class="mb-2">Уже зарегистрированы? Войдите в свой аккаунт</p>
        <a href="" class="text-center">
            <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
        </a>
    </div>

</main>

@endsection
