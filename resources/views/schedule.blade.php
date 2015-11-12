@extends('master')

@section('content')

    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ФИО</th>
                <th>Регион</th>
                <th>Отправление</th>
                <th>Прибытие</th>
                <th>Возвращение</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td> {{ $schedule->courier->fullName() }} </td>
                    <td> {{ $schedule->region->title }} </td>
                    <td> {{ $schedule->departure_date }} </td>
                    <td> {{ $schedule->arrival_date }} </td>
                    <td> {{ $schedule->arrival_date }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection