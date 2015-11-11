@extends('master')

@section('head')
    @parent
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker3.css">
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-datepicker.ru.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/form.js"></script>
@endsection

@section('content')

    <form action="form" method="post">

        <div class="form-group">
            <label for="departureDate">Отправление</label>
            <div id="departureDateDiv" data-date="{{ $today }}"></div>
            <input type="hidden" id="departureDate">
            {{--<input name="departureDate" type="date" class="form-control" id="departureDate" value="{{ $today }}">--}}
        </div>

        <div class="form-group">
            <label for="regionSelect">Регион</label>
            <select name="regionId" class="selectpicker form-control" id="regionSelect">
                @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="courierSelect">Курьер</label>
            <select name="couriedId" class="selectpicker form-control" id="courierSelect">
                @foreach($couriers as $courier)
                    <option value="{{ $courier->id }}">{{ $courier->fullName() }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="arrivalDate">Прибытие в регион</label>
            <input name="arrivalDate" type="text" class="form-control" id="arrivalDate" disabled="disabled">
        </div>

        <div class="form-group">
            <label for="returnDate">Возвращение</label>
            <input name="returnDate" type="text" class="form-control" id="returnDate" disabled="disabled" >
        </div>

        {{ csrf_field() }}

        <button type="submit" class="btn btn-default">Создать</button>
    </form>

@endsection