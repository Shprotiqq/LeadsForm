@extends('layouts.layout')

@section('content')

    <main class="form-signin w-100 m-auto">



        @if(session()->has('error'))
                <div class="alert alert-danger mt-5">
                    {{ session('error') }}
                </div>
        @endif

        <form class="mt-3" action="{{ route('login') }}" method="POST">
            @csrf

            <h1 class="h3 mb-3 fw-normal">Вход в учетную запись</h1>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email">
                <label for="email">Ваш e-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password">Ваш пароль</label>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Войти</button>
        </form>

        <a href="{{ route('password.request') }}"><button>Забыли пароль?</button></a>


    </main>

@endsection
