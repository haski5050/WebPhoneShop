@extends('layout')
@section('namePage')
    {{$info->Name}}
@endsection
@section('content')
    <div class="row">
        <div class="col-6">
            <img src="data:image/png;base64,{{ chunk_split(base64_encode($info->Image)) }}" class="d-block w-100">
        </div>
        <div class="col-6 text-center p-4">
            <h2> {{$info->Name}} </h2>
            @if($info->ICount<=0)
                <span style="color: darkred">Немає в наявності</span>
            @else
                <span style="color: #2a9055">Є в наявності</span>
            @endif
            <ul class="p-5 list-group list-group-flush">
                <li class="list-group-item list-group-item-warning">Колір: {{$info->Color}}</li>
                <li class="list-group-item list-group-item-warning">Матеріал: {{$info->Material}}</li>
            </ul>
            <h1 style="color: #2a9055; letter-spacing: 2px;">{{$info->Price}} грн</h1>
            <form method="post"  class="p-5">
                @csrf
                @if($info->ICount>0)
                    <span>Кількість:</span>
                    <input type="number" name="Count" value="1" style="width: 11%" min="1" max="{{$info->ICount}}">
                    <input type="submit" class="btn btn-success p-2" value="В кошик" >
                @else
                    <span>Кількість:</span>
                    <input type="number" name="Count" value="1" style="width: 11%" disabled >
                    <input type="submit" class="btn btn-success p-2" value="В кошик" disabled>
                @endif
            </form>
        </div>
    </div>
@endsection
