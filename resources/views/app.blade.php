@php
    if (!isset($page["sidebar"])) {
        $page["sidebar"] = "";
    }

    if (!isset($page["sub_sidebar"])) {
        $page["sub_sidebar"] = "";
    }

    if (isset($page["text_back"]) && !isset($page["url_back"])) {
        $page["url_back"] = url()->previous();
    }
@endphp

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

        @yield('head_script')
    </head>
    <body>
        @include('utils.structure.nav')

        <main class="{{ $page['sidebar'] == false ? 'disable-sidebar' : '' }}">
            @if($page['sidebar'] !== false)
                @include('utils.structure.sidebar')
            @endif

            <div class="container {{ isset($page['name']) ? "container--" . $page['name'] : "" }}">
                @include('utils.structure.header')

                @include('utils.structure.alert')

                @yield('content')
            </div>
        </main>

        <script src="/js/global/main.js"></script>
        <script src="/js/utils/animation/animations.js"></script>
        <script src="/js/utils/other/nav.js"></script>
        <script src="/js/utils/other/sidebar.js"></script>
        <script src="/js/utils/other/table.js"></script>
        <script src="/js/utils/other/tabs.js"></script>
        @if (session('scrollTo'))
            <script>
                scrollTo("{{ session('scrollTo') }}");
            </script>
        @endif
        @yield('script')
    </body>
</html>
