<!doctype html>
<html lang='fr'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1">
    <title>
        Mon joli site
    </title>
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
    <style> textarea {resize:none} </style>
</head>
<body>
<header class="jumbotron">
    <div class="container">
        @yield('header')
    </div>
</header>
<div class="container">
    @yield('contenu')
</div>
</body>
</html>
