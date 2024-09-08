@extends('layouts.layout')

@section('title')
    <title>Редактирование лида</title>
@endsection

@section('content')
    <main class="px-3">
        <form action="{{ route('lead.update', $lead->id) }}" method="POST">
            @csrf

            <p>Редактирование лида</p>
            <div class="mb-3">
                <label for="first_name" class="form-label">Имя лида</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                       value="{{ $lead->first_name }}">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Фамилия лида</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $lead->last_name }}">
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Номер телефона лида</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                       value="{{ $lead->phone_number }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail лида</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $lead->email }}">
            </div>

            <div class="mb-3">
                <label for="request" class="form-label">Текст заявки</label>
                <textarea class="form-control" id="request" rows="3" name="request">{{ $lead->lead_text }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Отредактировать заявку</button>
        </form>
    </main>
@endsection
