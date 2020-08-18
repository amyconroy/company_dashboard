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
                <div id="app">
                    <li><router-link class="items" to="/company/create">Add a New Company</router-link></li>
                    <li><router-link class="items" to="/files/upload">Upload a File</router-link></li>
                    <li><router-link class="items" to="/companies">View Companies</router-link></li>
                    <li><router-link class="items" to="/files">View Files</router-link></li>
                    <router-view></router-view>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
