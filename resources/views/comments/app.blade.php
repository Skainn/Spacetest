<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App')</title>
    <!-- Здесь можно подключить ваши стили CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <!-- Здесь может быть ваша шапка сайта -->
        <nav>
            <!-- Здесь может быть ваше навигационное меню -->
        </nav>
    </header>

    <main>
        <!-- Здесь будет контент каждой страницы -->
        @yield('content')
    </main>

    <footer>
        <!-- Здесь может быть ваш подвал -->
    </footer>

    <!-- Здесь можно подключить ваши скрипты JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
