@extends('master')

@section('content')

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
                <td> {{ $schedule->departure_date }} </td>
                <td>27.10.15</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection