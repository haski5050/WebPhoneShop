@extends('layout')
@section('namePage')
    Додати інформацію про товар
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
        <form method="post" action="{{ route('addPhone') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Mark">Марка</label>
                <input type="text" class="form-control" name="Mark" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Model">Модель</label>
                <input type="text" class="form-control" name="Model" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="DisplayDiagonal">Діагональ дисплея</label>
                <input type="text" class="form-control" name="DisplayDiagonal" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="ScreenResolution">Роздільна здатність</label>
                <input type="text" class="form-control" name="ScreenResolution" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="ScreenType">Тип дисплею</label>
                <input type="text" class="form-control" name="ScreenType" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="CommunicationStandards">Стандарти зв'язку</label>
                <input type="text" class="form-control" name="CommunicationStandards" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="SIMCount">Кількість сім-карт</label>
                <input type="number" class="form-control" name="SIMCount" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="CPUmodel">Модель процесора</label>
                <input type="text" class="form-control" name="CPUmodel" placeholder="">
            </div>
            <div class="form-group">
                <label for="CoreNumbers">Кількість ядер процесора</label>
                <input type="number" class="form-control" name="CoreNumbers" placeholder="">
            </div>
            <div class="form-group">
                <label for="CPUfrequency">Частота процесора</label>
                <input type="number" class="form-control" name="CPUfrequency" placeholder="">
            </div>
            <div class="form-group">
                <label for="GPUmodel">Модель графічного процесора</label>
                <input type="text" class="form-control" name="GPUmodel" placeholder="">
            </div>
            <div class="form-group">
                <label for="RAM">RAM</label>
                <input type="number" class="form-control" name="RAM" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="ROM">ROM</label>
                <input type="number" class="form-control" name="ROM" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="MainCamera">Кількість мегапікселів основної камери</label>
                <input type="number" class="form-control" name="MainCamera" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="VideoResolution">Роздільна здатність зйомки</label>
                <input type="text" class="form-control" name="VideoResolution" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="FrontCamera">Кількість мегапікселів фронтальної камери</label>
                <input type="number" class="form-control" name="FrontCamera" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Flash">Спалах</label>
                <input type="text" class="form-control" name="Flash" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Battery">Батарея</label>
                <input type="number" class="form-control" name="Battery" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="LongDescription">Довгий опис</label>
                <textarea class="form-control" name="LongDescription" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="ShortDescription">Короткий опис</label>
                <textarea class="form-control" name="ShortDescription" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="Price">Ціна</label>
                <input type="number" class="form-control" name="Price" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="Count">Кількість</label>
                <input type="number" class="form-control" name="Count" placeholder="" required>
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
            </div>
            <div class="form-group">
                <label for="Image2">Картинка 2</label>
                <input type="file" class="form-control-file" name="Image2">
            </div>
            <div class="form-group">
                <label for="Image3">Картинка 3</label>
                <input type="file" class="form-control-file" name="Image3">
            </div>
            <div class="form-group">
                <label for="Image4">Картинка 4</label>
                <input type="file" class="form-control-file" name="Image4">
            </div>
            <div class="form-group">
                <label for="Image5">Картинка 5</label>
                <input type="file" class="form-control-file" name="Image5">
            </div>
            <button type="submit" class="btn btn-primary">Додати</button>
        </form>
    </div>
@endsection
