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
    <div class="container trip-form">
            <div id="errors" class="alert alert-danger hidden" role="alert">
            </div>

            <form action="form" method="post">

                <div class="form-group">
                    <label for="departureDate">Отправление</label>
                    <div id="departureDateDiv" data-date="{{ $today }}"></div>
                    <input name="departureDate" type="hidden" id="departureDate" value="{{ $today }}">
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
                    <select name="courierId" class="selectpicker form-control" id="courierSelect">
                        @foreach($couriers as $courier)
                            <option value="{{ $courier->id }}">{{ $courier->fullName() }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="arrivalDate">Прибытие в регион</label>
                    <input name="arrivalDate" type="text" class="form-control" id="arrivalDate" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="returnDate">Возвращение</label>
                    <input name="returnDate" type="text" class="form-control" id="returnDate" readonly="readonly" >
                </div>

                {{ csrf_field() }}

                <button type="submit" class="btn btn-default">Создать</button>
            </form>
    </div>
@endsection