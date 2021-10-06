<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OZA</title>

    <link rel="stylesheet" href="/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.min.css">
</head>
<body>
<div class="header">
    @yield('header')
</div>
<div class="content">
    @yield('content')
</div>

<script src="/js/lib/jquery-3.3.1.min.js"></script>
<script src="/js/lib/bootstrap.min.js"></script>
@yield('script')
</body>
</html>
