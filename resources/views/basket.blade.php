@extends('layout')
@section('namePage')
    Корзина
@endsection
@section('content')
    <style>
        @media (max-device-width: 768px){
            .mob-fix {
                height: auto !important;
                line-height: 20px !important;
                text-align: center;
            }
        }
    </style>
    @if($phones != NULL)
        <div class="">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12" style="height: 25px; line-height: 25px;">
                    <span>Зображення:</span>
                </div>
                <div  class="col-lg-3 col-sm-3 col-xs-12 mob-fix" style="height: 25px; line-height: 25px;">
                    <span>Назва:</span>
                </div>
                <div class="col-lg-2 col-sm-2 col-xs-12 mob-fix" style="height: 25px; line-height: 25px;">
                    <span>Ціна:</span>
                </div>
                <div class="col-lg-1 col-sm-2 col-xs-12 mob-fix" style="height: 25px; line-height: 25px;">
                    <span>Кількість:</span>
                </div>
            </div>
            <hr>
    @foreach($phones as $el)
        <div class="">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12" style="height: 100px; line-height: 100px;">
                    <img  src="data:image/png;base64,{{ chunk_split(base64_encode($el->Image1)) }}" style="width: 80px; height: 80px;  " />
                </div>
                <div  class="col-lg-3 col-sm-3 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
                   <span>{{$el->Mark}} {{$el->Model}}</span>
                </div>
                <div class="col-lg-2 col-sm-2 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
                   <span>{{$el->Price}}</span>
                </div>
                <div class="col-lg-1 col-sm-2 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
                    <span>{{$el->bcount}}</span>
                </div>
                <div class="col-lg-3 col-sm-2 col-xs-12 mob-fix" style="height: 100px; line-height: 100px;">
                    <a href="{{route('deleteBasketItem',['id'=>$el->PhoneID])}}" class="btn btn-outline-danger">Видалити</a>
                </div>
            </div>
        </div>
    </div>
        <br>
    @endforeach
        <div style="width: 100%; text-align: right;" class="container">
            <hr>
            <div style="width: 50%; float: right;" class="p-1">
                <a class="btn btn-outline-success" href="{{route('orderBasket')}}">Оформити замовлення</a>
            </div>
        </div>
    @else
        <div class="text-center">
            <h3>Товарів в кошику немає</h3>
            <a href="{{route('MainPage')}}" class="btn btn-outline-success">Повернутися до товарів</a>
        </div>
    @endif
@endsection
