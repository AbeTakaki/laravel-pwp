<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            contact="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'つぶやきアプリ' }}</title>
        @stack('css')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- <link href="/resources/css/app.css" ref="stylesheet"> -->
        <!-- <script src="/resources/js/app.js" async defer></script> -->
    </head>
    <body class="bg-gray-50">
        {{ $slot }}
    </body>
</html>