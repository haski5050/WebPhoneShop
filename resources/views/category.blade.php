@extends('layout')
@section('namePage')
    Категорії
@endsection
@section('content')
    <div class="container d-flex justify-content-center">
        @foreach($categories as $el)
             <a href="{{route('categorySelect',$el->ID)}}" class="btn btn-outline-dark m-3">{{$el->Name}}</a>
        @endforeach
    </div>
@endsection
