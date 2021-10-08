<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OZA</title>

    <link rel="stylesheet" href="/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="/css/lib/fontawesome.min.css">
    <link rel="stylesheet" href="/css/main.min.css">
</head>
<body>

    @yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="/js/lib/jquery-3.3.1.min.js"></script>
<script src="/js/lib/bootstrap.min.js"></script>
<script src="/js/lib/popper.min.js"></script>
<script src="/js/lib/bootstrap.bundle.min.js"></script>
<script src="/js/utils/sidebar.js"></script>

@yield('script')
</body>
</html>
