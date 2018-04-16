<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/{{$preventCache}}-style.min.css">
</head>
<body>
    @include('partials._header')
    <main class="container">
        @yield('content')
    </main>
    <script type="text/javascript" src="/js/{{$preventCache}}-scripts.min.js"></script>
    @yield('page_js')
</body>
</html>
