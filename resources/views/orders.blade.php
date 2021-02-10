@extends('layout')
@section('namePage')
    Замовлення
@endsection
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <div class="accordion" id="accordionExample">

    @isset($buyers)
        @foreach($buyers as $b)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ $b->PIB }}
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Товар</th>
                                    <th scope="col">Ціна</th>
                                    <th scope="col">Дата</th>
                                    <th scope="col">Підтверджено</th>
                                    <th scope="col">Відправлено</th>
                                    <th scope="col">Доставлено</th>
                                </tr>
                            </thead>
                            @isset($purchases[$b->BuyerID])
                            <tbody>
                                @foreach($purchases[$b->BuyerID] as $o)
                                    <tr>
                                        <th scope="row">{{ $o->PurchID }}</th>
                                        <td><a href="">{{ $o->Mark." ".$o->Model }}</a></td>
                                        <td>{{$o->Total}}</td>
                                        <td>{{$o->Pdate}}</td>
                                        <form method="post" action="{{route('OrdersUpdate',[$o->PurchID])}}">
                                            @csrf
                                        <td>
                                            @if($o->Submit)
                                            <input type="checkbox" name="Submit" checked>
                                            @else
                                                <input type="checkbox" name="Submit">
                                            @endif
                                        </td>
                                        <td>
                                            @if($o->Send)
                                                <input type="checkbox" name="Send" checked>
                                            @else
                                                <input type="checkbox" name="Send">
                                            @endif
                                        </td>
                                        <td>
                                            @if($o->Delivered)
                                                <input type="checkbox" name="Delivered" checked>
                                            @else
                                                <input type="checkbox" name="Delivered">
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn-primary">Оновити</button>
                                        </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                            @else
                            <h2>Даних нема</h2>
                            @endisset
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    @endisset
@endsection
