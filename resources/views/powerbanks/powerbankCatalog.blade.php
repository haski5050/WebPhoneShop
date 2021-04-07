@extends('layout')
@section('namePage')
    Портативні батареї
@endsection
@section('content')
    @isset($info)
        @forelse($info as $el)
            <div class="card " style="width: 18rem; display: inline-block; margin: 20px;">
                <img src="data:image/png;base64,{{ chunk_split(base64_encode($el->Image)) }}" class="card-img-top" alt="" >
                <div class="card-body" >
                    <h5 class="card-title">{{$el->Name}}  {{$el->Model}}</h5>
                    <h3 class="card-title" style="color: #2a9055">{{$el->Price}} грн</h3>
                    <a href="{{route('aboutPowerBank',[$el->ID])}}" class="btn btn-primary">Детальніше</a>
                    @auth()
                        <a href="{{}}" class="btn btn-success">Редагувати</a>
                    @endauth
                </div>
            </div>
        @empty
            <h2 style="margin-top:300px;">Ніколи сюди не зайде</h2>
        @endforelse
    @else
        <h2 class="text-center">На даний момент товар відсутній</h2>
    @endisset
@endsection
