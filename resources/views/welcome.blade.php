<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel React application</title>
    <meta name="csrf-token" value="{{ csrf_token() }}">

    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div id="root"></div>
    </div>
    
    <script src="{{ url(mix('js/app.js')) }}" ></script>
</body>
</html>
