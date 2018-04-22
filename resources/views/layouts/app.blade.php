<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partials.head')
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
