@extends('layouts.layout')

@section('content')

    <main>
        @if($errors->any())
            <div class="alert alert-danger mt-5">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <p>Сброс пароля</p>
            <div class="mb-3">
                <label for="email" class="form-label">Введите Ваш e-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Отправить ссылку для сброса пароля</button>
        </form>
    </main>
@endsection

