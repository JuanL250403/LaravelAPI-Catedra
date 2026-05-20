<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('title', 'Mi Tienda')</title>
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
    <nav><!-- navbar --></nav>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <main class="container">
        @yield('content')
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="module" src="{{ asset('js/app.js') }}"></script>

</html>