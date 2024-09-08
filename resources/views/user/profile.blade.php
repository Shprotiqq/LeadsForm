@extends('layouts.layout')

@section('title')
    <title>Профиль</title>
@endsection

@section('content')

    <main>
        <h1>Ваш профиль</h1>
        Ваше имя: {{ auth()->user()->name }}
        Ваш e-mail: {{ auth()->user()->email }}
        <a href="{{ route('password.request') }}"><button>Смена пароля</button></a>
    </main>

@endsection
