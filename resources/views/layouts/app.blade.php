<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gameslot') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="has-background-light">
    <div id="app" style="display:flex; flex-direction: column; min-height: 100vh">
        {{-- Include navbar  --}}
        <header>
            @include('layouts.navigation.nav')
        </header>
        <main style="flex-grow: 1; display:flex; flex-direction: column">
            {{-- Success alert --}}
            @if (session('success'))
                <div class="notification is-success">
                    {{ session('success') }}
                </div>
            @endif
            {{-- Error alert --}}
            @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Include content --}}
            @yield('content')
        </main>
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                    &copy; 2021 SL Inc. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
