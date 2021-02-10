<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('namePage')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark noprint">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('MainPage') }}">Головна</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/category">Категорії</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">Про нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('basketPage')}}">Кошик</a>
                </li>
            </ul>
            <form class="d-flex" method="post" action="{{route('Search')}}">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Пошук" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Пошук</button>
            </form>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 5rem !important;">@yield('content')</div>
@auth()
    <div class="admin align-items-center noprint">
        <a href="/" class="btn btn-success">Головна</a>
        <div id="adminbtn">
        <a href="{{route('AddPage')}}" class="btn btn-success">Додати телефон</a>
        <a href="{{route('AddctPage')}}" class="btn btn-success">Додати категорію</a>
        <a href="{{route('ordersPage')}}" class="btn btn-success">Переглянути замовлення</a>
        <a href="{{route('reportsPurchases')}}" class="btn btn-success">Звітність покупок</a>
        <a href="{{route('reportsPage')}}" class="btn btn-success">Переглянути відгуки</a>
        </div>
        <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">Вийти</a>
    </div>
@endauth
<style>
    .admin{
        border: 1px solid rgba(0, 0, 0, 0.425);
        border-radius: 5px;
        position: fixed;
        right: 30px;
        bottom: 10px;
        padding: 8px 5px;
        background-color: rgba(0, 0, 0, 0.158);
        width: min-content;

    }
    .admin #adminbtn{
        display: none;

    }
    .admin:hover #adminbtn{
        display: block;
    }
    .admin a{
        display: block;
        margin-top: 3px;


    }
    .admin:hover{
        width: 300px;

    }
    </style>
</body>
</html>
