@extends('layout')
@section('namePage')
    Результат пошуку
@endsection
@section('content')
    <div class="">
        @foreach($phones as $el)
            <div class="card " style="width: 18rem; display: inline-block; margin: 20px;">
                <img src="data:image/png;base64,{{ chunk_split(base64_encode($el->Image1)) }}" class="card-img-top" alt="" >
                <div class="card-body" >
                    <h5 class="card-title">{{$el->Mark}} {{$el->Model}}</h5>
                    <p class="card-text">{{substr($el->ShortDescription,0,100)}}..</p>
                    <h3 class="card-title" style="color: #2a9055">{{$el->Price}} грн</h3>
                    <a href="#" class="btn btn-primary">Детальніше</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
