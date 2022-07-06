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
        <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
    </head>
    <body>
        <header>Header</header>
        <main>
            {{--    Show lỗi validate form         --}}
            @foreach($errors->all() AS $error)
                <p style="color:red">{{ $error }}</p>
            @endforeach

            @if(session()->has('success'))
                <p style="color:green">{{ session()->get('success') }}</p>
                @php(session()->forget('success'))
            @endif
            @if(session()->has('error'))
                <p style="color:red">{{ session()->get('error') }}</p>
                @php(session()->forget('error'))
            @endif

            @yield('content')
        </main>
        <footer>Footer</footer>
    </body>
</html>
