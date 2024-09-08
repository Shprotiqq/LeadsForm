@extends('layouts.layout')

@section('title')
    <title>Статистика по лидам</title>
@endsection

@section('content')
    <main>
        <h2>Список лидов</h2>

        <div class="row">
            @foreach($leads as $lead)
                <div class="col-4">
                    <div class="card m-1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lead->id }}</h5>
                            <p>{{ $lead->fullName }}</p>
                            <p>{{ $lead->email }}</p>
                            <p>{{ $lead->phone_number }}</p>
                            <p>{{ $lead->created_at->format('d-m-Y') }}</p>
                            <select name="status" class="form-select mb-2 change-status" data-lead_id="{{ $lead->id }}">
                                @foreach($statuses as $status)
                                    <option @selected($lead->status_id === $status->id) value="{{ $status->id }}">
                                        {{ $status->status }}</option>
                                @endforeach
                            </select>
                            <a class="btn btn-primary" href="{{ route('lead.edit', $lead->id) }}">Редактировать</a>
                            <a href="#" class="mt-2 btn btn-danger"
                               onclick="confirm('Вы уверены что хотите удалить лид?')">
                                Удалить
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <script>
            const selectElement = document.querySelectorAll('.change-status')

            selectElement.forEach(function (select) {
                select.addEventListener("change", (event) => {
                    const status = event.target.value
                    const leadId = event.target.dataset.lead_id
                    fetch(`/leads/${leadId}/status-update`, {
                        method: "PATCH",
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            "X-CSRF-Token": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            __token: "{{ csrf_token() }}",
                            _method: "PATCH",
                            status: status
                        })
                    });
                });
            })
        </script>
    </main>

@endsection
