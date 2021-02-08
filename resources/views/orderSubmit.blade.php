@extends('layout')
@section('namePage')
    Замовлення
@endsection
@section('content')
    <form action="{{route('orderUpdate')}}" method="POST">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="PIB">ПІБ</label>
                <input type="text" class="form-control" name="PIB" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Age">Вік</label>
                <input type="text" class="form-control" name="Age" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="PhoneNumber">Номер телефону</label>
                <input type="text" class="form-control" name="PhoneNumber" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Address">Адреса</label>
                <input type="text" class="form-control" name="Address" placeholder="" required>
                <label>Покупки</label>
            </div>
            @foreach($phones as $el)
                <div class="alert alert-success">
                    <h3>{{$el->Mark}} {{$el->Model}}</h3>
                    <b>Ціна: {{$el->Price}} </b>
                    <p>Кількість: {{$el->bcount}}</p>
                </div>
            @endforeach
            <b>Оплата здійснюється накладним платежом!</b>
        </div>
        <div class="p-3">
        <button type="submit" class="btn btn-outline-success">Підтвердити</button>
        </div>
    </form>
@endsection
