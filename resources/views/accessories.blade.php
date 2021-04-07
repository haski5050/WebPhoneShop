@extends('layout')
@section('namePage')
    Аксесуари
@endsection
@section('content')
    @foreach($categories as $el)
    <div class="card " style="width: 18rem; display: inline-block; margin: 20px;">
        <img src="data:image/png;base64,{{ chunk_split(base64_encode($el->Image)) }}" class="card-img-top" alt="" >
        <div class="card-body" >
            <h5 class="card-title">{{$el->Name}}</h5>
            <a href="{{route('accessoriesPage',[$el->ID])}}" class="btn btn-primary">Детальніше</a>
        </div>
    </div>
    @endforeach
@endsection
