{{--
resources/views/layouts/main.blade.php
- Tạo cấu trúc file như sau:
public /
       / css / style.css
       / js / script.js

 --}}
<!DOCTYPE html>
<html>
    <head>
        <title>@yield('page_title')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script src="{{ asset('js/script.js') }}"></script>
    </head>
    <body>
        <header>Header</header>
        <main>
            @yield('content')
        </main>
        <footer>Footer</footer>
    </body>
</html>
