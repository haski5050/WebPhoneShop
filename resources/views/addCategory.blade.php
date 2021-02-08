@extends('layout')
@section('namePage')
Додати інформацію про категорію
@endsection
@section('content')
<div>
    <form action="{{route('addCategory')}}" method="post">
        @csrf
    <div class="form-group">
        <label for="CategoryName">Категорія</label>
        <input type="text" class="form-control" name="CategoryName" placeholder="" required>
    </div>
        <button type="submit" class="btn btn-primary mt-2">Додати</button>
    </form>
</div>
@endsection
