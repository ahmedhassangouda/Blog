<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
<body>
    <div id="app">
        @include('layouts.navbar')
        <main class="py-4">
            <div class="container">
                <div class="row justfy-content-center">
                    @yield('sidebar')
                    @yield('content')
                </div>
            </div>
        </main>
</body>
</html>
