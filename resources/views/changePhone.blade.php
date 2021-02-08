@extends('layout')
@section('namePage')
    Редагувати інформацію
@endsection
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('updatePhone',['id'=>$phone->ID])}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Mark">Марка</label>
                <input type="text" class="form-control" value="{{$phone->Mark}}" name="Mark" placeholder=""required>
            </div>
            <div class="form-group">
                <label for="Model">Модель</label>
                <input type="text" class="form-control" value="{{$phone->Model}}" name="Model" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="DisplayDiagonal">Діагональ дисплея</label>
                <input type="text" class="form-control" value="{{$phone->DisplayDiagonal}}" name="DisplayDiagonal" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="ScreenResolution">Роздільна здатність</label>
                <input type="text" class="form-control" value="{{$phone->ScreenResolution}}" name="ScreenResolution" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="ScreenType">Тип дисплею</label>
                <input type="text" class="form-control" value="{{$phone->ScreenType}}" name="ScreenType" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="CommunicationStandards">Стандарти зв'язку</label>
                <input type="text" class="form-control" value="{{$phone->CommunicationStandards}}" name="CommunicationStandards" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="SIMCount">Кількість сім-карт</label>
                <input type="number" class="form-control" value="{{$phone->SIMCount}}" name="SIMCount" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="CPUmodel">Модель процесора</label>
                <input type="text" class="form-control" value="{{$phone->CPUmodel}}" name="CPUmodel" placeholder="">
            </div>
            <div class="form-group">
                <label for="CoreNumbers">Кількість ядер процесора</label>
                <input type="number" class="form-control" value="{{$phone->CoreNumbers}}" name="CoreNumbers" placeholder="">
            </div>
            <div class="form-group">
                <label for="CPUfrequency">Частота процесора</label>
                <input type="number" class="form-control" value="{{$phone->CPUfrequency}}" name="CPUfrequency" placeholder="">
            </div>
            <div class="form-group">
                <label for="GPUmodel">Модель графічного процесора</label>
                <input type="text" class="form-control" value="{{$phone->GPUmodel}}" name="GPUmodel" placeholder="">
            </div>
            <div class="form-group">
                <label for="RAM">RAM</label>
                <input type="number" class="form-control" value="{{$phone->RAM}}" name="RAM" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="ROM">ROM</label>
                <input type="number" class="form-control" value="{{$phone->ROM}}" name="ROM" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="MainCamera">Кількість мегапікселів основної камери</label>
                <input type="number" class="form-control" value="{{$phone->MainCamera}}" name="MainCamera" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="VideoResolution">Роздільна здатність зйомки</label>
                <input type="text" class="form-control" value="{{$phone->VideoResolution}}" name="VideoResolution" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="FrontCamera">Кількість мегапікселів фронтальної камери</label>
                <input type="number" class="form-control" value="{{$phone->FrontCamera}}" name="FrontCamera" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Flash">Спалах</label>
                <input type="text" class="form-control" value="{{$phone->Flash}}" name="Flash" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Battery">Батарея</label>
                <input type="number" class="form-control" value="{{$phone->Battery}}" name="Battery" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="LongDescription">Довгий опис</label>
                <textarea class="form-control" name="LongDescription" rows="5">{{$phone->LongDescription}}</textarea>
            </div>
            <div class="form-group">
                <label for="ShortDescription">Короткий опис</label>
                <textarea class="form-control" name="ShortDescription" rows="3">{{$phone->ShortDescription}}</textarea>
            </div>
            <div class="form-group">
                <label for="Price">Ціна</label>
                <input type="number" class="form-control" value="{{$phone->Price}}" name="Price" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Count">Кількість</label>
                <input type="number" class="form-control" value="{{$phone->ICount}}" name="Count" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Категорія</label>
                <select class="form-control form-control-lg" name="CategoryID">
                    @foreach($category as $el)
                        <option value="{{ $el->ID }}">{{ $el->Name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Image1">Картинка 1</label>
                <input type="file" class="form-control-file" name="Image1">
                <input type="checkbox" name="Check1">Видалити фото
            </div>
            <div class="form-group">
                <label for="Image2">Картинка 2</label>
                <input type="file" class="form-control-file" name="Image2">
                <input type="checkbox" name="Check2">Видалити фото
            </div>
            <div class="form-group">
                <label for="Image3">Картинка 3</label>
                <input type="file" class="form-control-file" name="Image3">
                <input type="checkbox" name="Check3">Видалити фото
            </div>
            <div class="form-group">
                <label for="Image4">Картинка 4</label>
                <input type="file" class="form-control-file" name="Image4">
                <input type="checkbox" name="Check4">Видалити фото
            </div>
            <div class="form-group">
                <label for="Image5">Картинка 5</label>
                <input type="file" class="form-control-file" name="Image5">
                <input type="checkbox" name="Check5">Видалити фото
            </div>
            <div class="p-3">
                <button type="submit" class="btn btn-primary p-2">Оновити</button>
                <a href="{{route('deletePhone',['id'=>$phone->ID])}}" class="btn btn-danger p-2">Видалити</a>
            </div>
            </form>

    </div>
@endsection
