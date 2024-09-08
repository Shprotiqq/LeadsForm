@extends('layouts.layout')

@section('title')
    <title>Сброс пароля</title>
@endsection

@section('content')

    <main>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <p>Сброс пароля</p>
            <div class="mb-3">
                <label for="email" class="form-label">Введите Ваш e-mail</label>
                <input type="email" class="form-control" id="email" name="email"
                       @auth value="{{ auth()->user()->email }}"@endauth
                >
            </div>
            <button type="submit" class="btn btn-primary">Отправить ссылку для сброса пароля</button>
        </form>
    </main>
@endsection

