<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS files --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- JS files --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


    <title>Blog</title>
</head>

<body>
    <div class="row p-0 m-0 bg-secondary">
        <div class="sidbar col-2 bg-warning p-2" style="height:100vh">
            <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="">
            <h2>Nawara Blog</h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Authors</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
        <div class="main col-10">
            @yield('main')
        </div>
    </div>
</body>

</html>
