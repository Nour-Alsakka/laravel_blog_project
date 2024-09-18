@extends('site.layouts.layout')

@section('main')
    <div class="swiper mySwiper" style="margin-top:76px">
        <div class="swiper-wrapper">
            @foreach ($slider_posts as $post)
                <div class="swiper-slide" style="position: relative">
                    <img src="{{ url('storage/media/' . $post->image) }}" alt="">
                    <div style="position: absolute; bottom:10%; left:50% ;z-index:3;transform:translate(-50%,-50%);">
                        <a href="{{ url('news/' . $post->id) }}"
                            style="padding:10px 40px;color:#ccc;font-size:40px">{{ $post->title }}</a>
                    </div>
                    <div
                        style="position: absolute;bottom:0;width:100%;height:80%;z-index:1;background-image:linear-gradient(to bottom, rgba(255,0,0,0),rgba(0,0,0.8))">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $("#div1").load("http://localhost:8000/api/ajax");
            })
        })
    </script>

    <div class="container my-5">
        <h5 class="text-center mb-2">Show All Blog for each Category</h5>
        <div class="mb-5" style="display: flex;gap:10px;justify-content:center">
            @foreach ($categories as $category)
                <a class="btn btn-secondary" aria-current="page"
                    href="/category/{{ $category->id }}">{{ $category->name }}</a>
            @endforeach
        </div>
        <div class="row ">
            @foreach ($categories as $category)
                <div class="col-12 col-lg-4 col-md-6">
                    <h5>{{ $category->name }}</h5>
                    <hr>

                    @php $counter = 0 @endphp

                    @foreach ($category->blogs as $post)
                        <div class="row mb-3">
                            <div class="col-3  @if ($counter == 0) col-12 first-blog @endif">
                                <img class="blog_img"
                                    style="width: 90px; height: 70px; object-fit: cover; border-radius: 10px"
                                    src="{{ url('storage/media/' . $post->image) }}">
                            </div>
                            <div class=" col-9 @if ($counter == 0)mb-3 col-12 first-blog @endif">
                                <h6><a href="{{ url('news/' . $post->id) }}">{{ $post->title }}</a></h6>
                                <p class="row">
                                    <span class="col-3 @if ($counter == 0) col-4 @endif"
                                        style="font-size: 12px;">
                                        @if ($post->author->image)
                                            <img src="{{ url('storage/media/' . $post->author->image) }}"
                                                style="margin-right:4px;width: 25px; height:25px;object-fit:cover;border-radius:50px;"
                                                alt="">
                                        @else
                                            <img class="img-fluid " src="{{ asset('images/user.png') }}"
                                                style="margin-right:4px;width: 25px; height:25px;object-fit:cover;border-radius:50px;">
                                        @endif
                                        {{ $post->author->name }}
                                    </span>
                                    <span class="col-4  text-end @if ($counter == 0) col-4 @endif"
                                        style="font-size: 12px;color:#777">
                                        {{ date('d-m-Y', strtotime($post->created_at)) }}
                                    </span>
                                    <span class="col-2 text-end @if ($counter == 0) col-2 @endif"
                                        style="font-size: 11px;color:#b53434;@if ($counter == 0) font-size: 14px;@endif">
                                        {{ $post->likes_count }} <i class="fa fa-heart"></i>
                                    </span>

                                </p>
                            </div>
                        </div>

                        @php $counter++ @endphp
                    @endforeach

                </div>
            @endforeach
        </div>
    </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
