<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>OZA</title>

        <link rel="stylesheet" href="/css/lib/fontawesome.min.css">
        <link rel="stylesheet" href="/css/main.min.css">
    </head>
    <body>
        @include('utils.nav')

        <main>
            @if($page['sidebar'] !== false)
            @include('utils.sidebar')
            @endif
            <div class="container">

                @include('utils.header')

                @yield('content')
            </div>
        </main>


        <script src="/js/utils/main.js"></script>
        <script src="/js/utils/animations.js"></script>
        <script src="/js/utils/sidebar.js"></script>
        <script src="/js/utils/table.js"></script>
        <script src="/js/utils/tabs.js"></script>
        <script src="/js/app/dashboard.js"></script>
        @yield('script')
    </body>
</html>
@php(session()->forget('error'))
