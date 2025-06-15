<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Florist Online') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<body class="bg-gray-50 text-gray-800">

    @include('layouts.navigation')
    <main class="min-h-screen">
        @yield('content')
    </main>

</body>
</html>