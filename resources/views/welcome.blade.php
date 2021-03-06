<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title m-b-md navbar-fixed-top>Company Dashboard</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        
        <!-- main html-->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Company Management Dashboard
                </div>
                <div id="app">
                    <div class = "links">
                        <router-link to="/company/create">Add a New Company</router-link>
                        <router-link to="/files/upload">Upload a File</router-link>
                        <router-link to="/companies">View Companies</router-link>
                        <router-link to="/files">View Files</router-link>
                    </div>
                    <router-view></router-view>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
