@extends('layouts.layout')

@section('content')

    <main class="px-3">
        <form action="{{ route('lead.store') }}" method="POST">
            @csrf

            <p>Создайте заявку прямо сейчас</p>
            <div class="mb-3">
                <label for="first_name" class="form-label">Ваше имя</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Ваша фамилия</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Ваше номер телефона</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Ваш e-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="request" class="form-label">Текст заявки</label>
                <textarea class="form-control" id="request" rows="3" name="request"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Отправить заявку</button>
        </form>
    </main>

@endsection

