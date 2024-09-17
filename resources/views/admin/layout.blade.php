<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS files --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('filepond/filepond.min.css') }}">
    {{-- JS files --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('filepond/filepond.min.js') }}"></script>




    {{-- <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('css/tom-select.css') }}">
    <script src="{{ asset('js/tom-select.js') }}"></script> --}}




    <title>Blog</title>
</head>

<body>
    <div class="row p-0 m-0">
        <div class="sidbar col-2 p-2 bg-secondary" style="height:100vh">
            <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="">
            <h2>N Blog</h2>
            <ul>
                <li><a href="{{ url('dashboard/') }}">Home</a></li>
                <li><a href="{{ url('dashboard/blogs') }}">Blogs</a></li>
                {{-- <li><a href="{{ route('dashboard.blogs.index') }}">Blogs</a></li> --}}
                <li><a href="{{ url('dashboard/categories') }}">Categories</a></li>
                <li><a href="{{ url('dashboard/authors') }}">Authors</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
        <div class="main col-10 p-2">
            @yield('main')
        </div>
    </div>
</body>

</html>
