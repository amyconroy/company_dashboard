<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Company Dashboard</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
         <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
      <div id="app">
      </div>
      <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>