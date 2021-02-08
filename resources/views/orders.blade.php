@extends('layout')
@section('namePage')
    Замовлення
@endsection
@section('content')
    <div class="accordion" id="accordionTariff">
            <div class="card">
                <a class="card-link" data-toggle="collapse" data-parent="#accordion" href="">
                    <div class="card-header">

                    </div>
                </a>
{{--                <div id="collapse{{  }}" class="collapse">--}}
                    <div class="card-body">
{{--                        {{ $el->name }}--}}
{{--                        <br> {{ date('d.m.Y', strtotime()) }}--}}
{{--                        <br> {{ date('d.m.Y', strtotime()) }}--}}
{{--                        <br> {{  }} <br> {{  }}--}}
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tariffModal" data-whatever="">Замовити</button>
                            <div class="d-flex justify-content-center">
                                <hr>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
{{--                                    <a href="{{ route('admin-edit-tariff', ['id' =>]) }}" class="btn btn-secondary">Редагувати</a>--}}
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="">Видалити</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <p>No data</p>
    </div>
@endsection
