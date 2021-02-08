@extends('layout')
@section('namePage')
    Категорії
@endsection
@section('content')
    <div class="container">
        @foreach($categories as $el)
            <form method="post" action="{{route('categorySelect')}}">
                @csrf
                <div class="col p-1">
                    <div class="row-cols-3">
                <button class="btn btn-outline-success" type="submit">{{$el->Name}}</button>
                    </div>
                    <div class="col">
                <input name="categoryId" value="{{$el->ID}}" hidden class="form-control">
                    </div>
                </div>
            </form>
        @endforeach
</div>
@endsection
