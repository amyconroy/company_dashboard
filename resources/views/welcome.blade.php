<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Company Dashboard</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        
        <!-- main html-->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title">
                    Company Management Dashboard
                </div>
                <div class="links">
                    <a href="#">Add a New Company</a>
                    <a href="#">Upload a File</a>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                        Companies
                        <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>  
                        <a href="#" class="list-group-item list-group-item-action list-group-item-primary">This is a primary list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">This is a secondary list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-success">This is a success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-danger">This is a danger list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-warning">This is a warning list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-info">This is a info list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a light list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">This is a dark list group item</a>
                    </div>
                        </div>
                            <div class="col-sm">
                                Files
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>  
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">This is a primary list group item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">This is a secondary list group item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">This is a success list group item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-danger">This is a danger list group item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-warning">This is a warning list group item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-info">This is a info list group item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-light">This is a light list group item</a>
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-dark">This is a dark list group item</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
