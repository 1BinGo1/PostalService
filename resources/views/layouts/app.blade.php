<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Страница сайта' }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @livewireStyles
</head>
<body>

@include('layouts.header')

    <div id="app">
        <main class="py-4" id="main">
            <div class="container">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible mt-4" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif
                @yield('breadcrumbs')
                @yield('content')
            </div>
        </main>
    </div>

@include('layouts.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
    @stack('scripts')

</body>
</html>
