<?php

use App\Models\Department;
use App\Models\Site;

?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield ('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
</head>
<body>

<header>
    <div class="wrapper">
        <nav>
            <a href="{{ route('employes')}}">Все сотрудники</a>
            <div class="dropdown">
                <span>Отделы </span>
                <div class="dropdown-content">
                    @foreach(Department::getDepartments() as $department)
                        <a href="{{url('/employes/' . $department->id)}}">{{$department->name}}</a>
                        <hr>
                    @endforeach
                </div>
            </div>
            <div class="dropdown-count-page">
                <span>Элементов на странице {{session()->get('items_on_page', 10)}} </span>
                <div class="dropdown-content count-page-width">
                    @foreach(Site::getItemsOnPage() as $item)
                        <a href="{{url('/set-items-on-page/'.$item)}}">{{$item}}</a>
                        <hr>
                    @endforeach
                </div>
            </div>
        </nav>
    </div>
</header>


<section class="page-content">
    <div class="container">
        @yield ('content')
    </div>

</section>


<footer class="footer-site  text-muted text-center text-small">

</footer>

<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
