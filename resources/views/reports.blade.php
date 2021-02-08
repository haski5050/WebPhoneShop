@extends('layout')
@section('namePage')
    Відгуки
@endsection
@section('content')
    <h1>Всі відгуки</h1>
@foreach($reports as $el)
    <div class="alert alert-dark">
        <h3>{{$el->Subject}}</h3>
        <b>{{$el->Email}}</b>
        <p>{{$el->Message}}</p>
    </div>
@endforeach
@endsection
