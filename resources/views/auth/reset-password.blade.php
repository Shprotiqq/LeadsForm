@extends('layouts.layout')

@section('content')

    <form class="mt-3" action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $request->token }}">

        <h1 class="h3 mb-3 fw-normal">Сброс пароля</h1>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $request->email) }}">
            <label for="email">Ваш e-mail</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password">
            <label for="password">Введите новый пароль</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            <label for="password_confirmation">Подтвердите новый пароль</label>
        </div>

        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Сбросить пароль</button>
    </form>

@endsection
