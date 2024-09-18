<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YEP Blog</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swipper.css') }}">


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/swipper.js') }}"></script>

    @yield('cssAndJs')
</head>

<body>
    <nav class="navbar  navbar-expand-lg fixed-top " style="background-color:#eee">
        <div class="container ">

            <a class="navbar-brand mx-5" href="{{ url('/') }}"><img class="img-fluid " style="width: 50px"
                    src="{{ asset('images/logo.png') }}"></a>
            @auth
                <a class="navbar-brand mx-5" href="{{ url('/') }}">{{ Auth::user()->name }}</a>
                <a class=" mx-2" href="{{ url('/dashboard/posts') }}">Go to Dashboard</a>
            @else
                <a class=" mx-2" href="{{ url('/register') }}">Register</a>
                <a class=" mx-2" href="{{ url('/login') }}">Login</a>
            @endauth

            {{-- <input style="outline: none;" class="right" id="search-box" type="text" oninput="reset_border()"> --}}
            <div class="search-box " style="position: relative;width:400px">

                <input type="text" id="search-input" placeholder="Search..." style="width: 100%">
                <div id="search-results"></div>
            </div>
            {{-- <div>JJ</div> --}}
            {{-- <div id="search-results"> --}}
            {{-- @foreach ($blogs as $blog)
                    <h2>{{ $blog->title }}</h2>
                    <p>{{ $blog->content }}</p>
                @endforeach --}}
            {{-- </div> --}}

            {{-- <button class="btn btn-secondary mx-1 right" onclick="search()">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button> --}}

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div id="div1">

    </div>

    @yield('main')
    <div id="content"></div>
    <footer class="container my-4">
        <div class="row">
            <div class="col-12 col-lg-4 col-md-4 about">
                <h5>About Me</h5>
                <img class="img-fluid " src="{{ asset('images/img.jpg') }}">
                <p>Lorem ipsum dolor sit, azzmet conse ctetur adipi sicing elit. Reprehe Quos fugit expli cabo dolorem
                    dolore magnam. Ipsam deleniti dolorum quisquam?</p>
            </div>

            <div class="col-12 col-lg-4 col-md-4 posts">
                <h5>Latest Posts</h5>
                {{-- <div class="content">
                    <img class="img-fluid w-24 " src="{{asset('images/img.jpg')}}">
                    <div>
                        <h6>labadipi sicing elit  sicing elit </h6>
                        <p>
                            <span class="red">abcdefgh</span>
                            <span class="white">7/7/2007</span>
                        </p>
                    </div>
                </div> --}}
                @foreach ($latest_posts as $post)
                    <div class="row mb-3">
                        <div class="col-4">
                            <img style="width: 90px; height: 70px; object-fit: cover; border-radius: 10px"
                                src="{{ url('storage/media/' . $post->image) }}">
                        </div>
                        <div class="col-8">
                            <h6><a href="{{ url('news/' . $post->id) }}">{{ $post->title }}</a></h6>
                            <p class="row">
                                <span class="col-4" style="font-size: 12px;color:brown">abcdefgh</span>
                                <span class="col-8" style="font-size: 12px;color:#777">{{ $post->created_at }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="col-12 col-lg-4 col-md-4 posts">
                <h5>Popular Posts</h5>
                @foreach ($popular_posts as $post)
                    <div class="row mb-3">
                        <div class="col-4">
                            <img style="width: 90px; height: 70px; object-fit: cover; border-radius: 10px"
                                src="{{ url('storage/media/' . $post->image) }}">
                        </div>
                        <div class=" col-8">
                            <h6><a href="{{ url('news/' . $post->id) }}">{{ $post->title }}</a></h6>
                            <p class="row">
                                <span class="col-4" style="font-size: 12px;color:brown">abcdefgh</span>
                                <span class="col-8" style="font-size: 12px;color:#777">{{ $post->created_at }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-6">@copyright abcd efg higk lmno</div>
            <div class="col-6 text-end">
                <span class="mx-4"><i class="fa-brands fa-facebook mx-2"></i>Facebook</span>
                <span class="mx-4"><i class="fa-brands fa-instagram mx-2"></i>instagram</span>
                <span class="mx-4"><i class="fa-brands fa-twitter mx-2"></i>twitter</span>
            </div>
        </div>
    </footer>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/api/search',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('#search-results').html(''); // clear the content div
                    if (query !== "") {
                        $.each(data, function(index, item) {
                            $('#search-results').append(
                                `<p><a href="/news/${item.id}"> ${item.title} </a></p>`
                            ); // append the search results
                        });
                    }
                }
            });
        });
    });
</script>
{{-- <script>
    $('#search-box').on('keyup', function() {
        $value = $(this).val()
        $.ajax({
            type: 'get',
            url: {{ URL::to('search') }},
            data: {
                'search': $value
            },
            success: function(data) {
                console.log(data)
                $('#content').html($value)
            }
        })
    })
</script> --}}
