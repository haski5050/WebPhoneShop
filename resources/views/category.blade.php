@extends('layout')
@section('namePage')
    Категорії
@endsection
@section('content')
{{--    <div class="container">--}}
{{--        <tr>--}}
{{--        @foreach($categories as $el)--}}
{{--            <td>--}}
{{--            <form method="post" action="{{route('categorySelect')}}">--}}
{{--                @csrf--}}
{{--                <button class="btn btn-outline-success" type="submit">{{$el->Name}}</button>--}}
{{--                <input name="categoryId" value="{{$el->ID}}" hidden class="form-control">--}}
{{--            </form>--}}
{{--            </td>--}}
{{--        @endforeach--}}
{{--        </tr>--}}
{{--</div>--}}
    <div class="container d-flex justify-content-center">
        @foreach($categories as $el)
             <a href="{{route('categorySelect',$el->ID)}}" class="btn btn-outline-dark m-3">{{$el->Name}}</a>
        @endforeach
    </div>
@endsection
