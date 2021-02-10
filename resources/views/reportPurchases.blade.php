@extends('layout')
@section('namePage')
    Звіт по продажу
@endsection
@section('content')
    @isset($in)
        <div id="print-content">
        <div class="col-12 text-center">
        <h3>Рейтинг продажу</h3>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Марка</th>
                <th scope="col">Кількість продаж</th>
                <th scope="col">На суму</th>
                <th scope="col">Дата останньої покупки</th>
            </tr>
            </thead>
            <tbody>
            @foreach($in as $i=>$el)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$el->Mark}} {{$el->Model}}</td>
                <td>{{$el->pmax}}</td>
                <td>{{$el->money}} грн</td>
                <td>{{date("d.m.Y H:i",strtotime($el->dt))}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            <br>
            <h3 class="text-center">Смартфони які не продаються</h3>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Марка</th>
                <th scope="col">Модель</th>
                <th scope="col">Кількість продаж</th>
            </tr>
            </thead>
            @foreach($ls as $i=>$el)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$el->Mark}} </td>
                    <td>{{$el->Model}}</td>
                    <td>Немає</td>
                </tr>

            @endforeach
            </tbody>
        </table>
        </div>
        <a class="btn btn-outline-success noprint" onclick="window.print()">Друк</a>
    @else
        <h2 class="text-center">Немає покупок</h2>
    @endisset
    <style>
        @media print {
            .noprint{
                display: none;
            }
        }
    </style>
@endsection
