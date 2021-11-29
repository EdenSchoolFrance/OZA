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
        @include('utils.structure.nav')

        <main>
            @if($page['sidebar'] !== false)
            @include('utils.structure.sidebar')
            @endif
            <div class="container">

                @include('utils.structure.header')

                @yield('content')
            </div>
        </main>


        <script src="/js/global/main.js"></script>
        <script src="/js/utils/animation/animations.js"></script>
        <script src="/js/utils/other/sidebar.js"></script>
        <script src="/js/utils/other/table.js"></script>
        <script src="/js/utils/other/tabs.js"></script>
        <script src="/js/app/dashboard.js"></script>
        @yield('script')
    </body>
</html>
@php(session()->forget('error'))
