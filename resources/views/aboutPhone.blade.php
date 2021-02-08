@extends('layout')
@section('namePage')
    {{$phone->Mark}} {{$phone->Model}}
@endsection
@section('content')
    <style>

    </style>
   <div class="container">
       <div class="row">
            <div class="col-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($phone->Image1)) }}" class="d-block w-100">
                        </div>
                        @if($phone->Image2)
                        <div class="carousel-item">
                            <img src="data:image/png;base64,{{ chunk_split(base64_encode($phone->Image2)) }}" class="d-block w-100">
                        </div>
                        @endif
                        @if($phone->Image3)
                            <div class="carousel-item">
                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($phone->Image3)) }}" class="d-block w-100">
                            </div>
                        @endif
                        @if($phone->Image4)
                            <div class="carousel-item">
                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($phone->Image4)) }}" class="d-block w-100">
                            </div>
                        @endif
                        @if($phone->Image5)
                            <div class="carousel-item">
                                <img src="data:image/png;base64,{{ chunk_split(base64_encode($phone->Image5)) }}" class="d-block w-100">
                            </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev" style="filter: invert(100%) ">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Попередня</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next" style="filter: invert(100%) " >
                        <span class="carousel-control-next-icon" aria-hidden="true" ></span>
                        <span class="visually-hidden" >Наступна</span>
                    </a>
                </div>
            </div>
           <div class="col-6 text-center p-4">
               <h2> {{$phone->Mark}} {{$phone->Model}} </h2>
               @if($phone->ICount<=0)
                   <span style="color: darkred">Немає в наявності</span>
               @else
                   <span style="color: #2a9055">Є в наявності</span>
               @endif
               <ul class="p-5 list-group list-group-flush">
                   <li class="list-group-item list-group-item-warning">Сховище: {{$phone->ROM}} гб</li>
                   <li class="list-group-item list-group-item-warning">Оперативна пам'ять: {{$phone->RAM}} гб</li>
                   <li class="list-group-item list-group-item-warning">Камера: {{$phone->MainCamera}} мп</li>
                   <li class="list-group-item list-group-item-warning">Діагональ дисплея: {{$phone->DisplayDiagonal}} дюймів</li>
               </ul>
               <h1 style="color: #2a9055; letter-spacing: 2px;">{{$phone->Price}} грн</h1>
               <form method="post" action="{{route('addToBasket',['id'=>$phone->ID])}}" class="p-5">
                   @csrf
                   @if($phone->ICount>0)
                       <span>Кількість:</span>
                       <input type="number" name="Count" value="1" style="width: 11%" min="1" max="{{$phone->ICount}}">
                       <input type="submit" class="btn btn-success p-2" value="В кошик" >
                   @else
                       <span>Кількість:</span>
                       <input type="number" name="Count" value="1" style="width: 11%" disabled >
                       <input type="submit" class="btn btn-success p-2" value="В кошик" disabled>
                   @endif
               </form>
           </div>
       </div>
       <hr class="">
    <div style="padding-top: 2%">
       <div class="row">
           <div class="col-12">
               <p class="text-monospace p-3 text-center">{{ $phone->LongDescription }}</p>
           </div>
       </div>
    </div>
       <hr class="my-3">
       <div class="row">
           <div class="col-12 text-center">
               <h4>Всі характеристики:</h4>
               <ul class="p-2 list-group list-group-flush">
                   <li class="list-group-item list-group-item-dark">Діагональ дисплея: {{$phone->DisplayDiagonal}} дюймів</li>
                   <li class="list-group-item list-group-item-dark">Роздільна здатність дисплею: {{$phone->ScreenResolution}}</li>
                   <li class="list-group-item list-group-item-dark">Тип дисплею: {{$phone->ScreenType}}</li>
                   <li class="list-group-item list-group-item-dark">Стандарти зв'язку: {{$phone->CommunicationStandards}}</li>
                   <li class="list-group-item list-group-item-dark">Кількість сім-карт: {{$phone->SIMCount}}</li>
                   <li class="list-group-item list-group-item-dark">Модель процесора:
                       @if($phone->CPUmodel!=NULL)
                           {{$phone->CPUmodel}}
                       @else
                            немає інформації
                       @endif
                   </li>
                   <li class="list-group-item list-group-item-dark">Кількість ядер процесора:
                       @if($phone->CoreNumbers!=NULL)
                           {{$phone->CoreNumbers}}
                       @else
                           немає інформації
                       @endif
                   </li>
                   <li class="list-group-item list-group-item-dark">Частота процесора:
                       @if($phone->CPUfrequency!=NULL)
                           {{$phone->CPUfrequency}} mHz
                       @else
                           немає інформації
                       @endif
                   </li>
                   <li class="list-group-item list-group-item-dark">Модель графічного процесора:
                       @if($phone->GPUmodel!=NULL)
                           {{$phone->GPUmodel}}
                       @else
                           немає інформації
                       @endif
                   </li>
                   <li class="list-group-item list-group-item-dark">Кількість оперативної пам'яті: {{$phone->RAM}} gb</li>
                   <li class="list-group-item list-group-item-dark">Кількість пам'яті сховища: {{$phone->ROM}} gb</li>
                   <li class="list-group-item list-group-item-dark">Основна камера: {{$phone->MainCamera}} px</li>
                   <li class="list-group-item list-group-item-dark">Роздільна здатність відео: {{$phone->VideoResolution}}</li>
                   <li class="list-group-item list-group-item-dark">Фронтальна камера: {{$phone->FrontCamera}} px</li>
                   <li class="list-group-item list-group-item-dark">Вспишка: {{$phone->Flash}}</li>
                   <li class="list-group-item list-group-item-dark">Батарея: {{$phone->Battery}} mAh</li>
               </ul>
           </div>
           <hr class="my-2">
       </div>
   </div>
@endsection
