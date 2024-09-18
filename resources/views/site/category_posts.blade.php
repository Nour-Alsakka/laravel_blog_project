@extends('site.layouts.layout')

@section('main')
    <div class="container" style="padding-top: 100px">

        <h4 class="text-capitalize text-center">Article about {{ $category->name }}</h4>
        <div class="row p-0 mb-3">
            @foreach ($category->blogs as $blog)
                <div class="col-12 col-lg-6 col-md-6 category-blog my-2">
                    <img class="blog-img" style="width: 100%; height: 70px; object-fit: cover; border-radius: 10px"
                        src="{{ url('storage/media/' . $blog->image) }}">

                    <p>
                        <img src="{{ url('storage/media/' . $blog->author->image) }}"
                            style="margin-right:4px;width: 30px; height:30px;object-fit:cover;border-radius:50%;"
                            alt="">
                        <span class="" style="font-size: 12px; color:rgb(157, 4, 4)">
                            {{ $blog->author->name }}
                        </span>
                        <span class="mx-4 " style="font-size: 12px;color:#777">
                            | {{ $blog->created_at }}
                            {{-- {{ date('d-m-Y', strtotime($blog->created_at)) }} --}}
                        </span>
                    </p>
                    <h5><a href="{{ url('news/' . $blog->id) }}">{{ $blog->title }}</a></h5>
                </div>
            @endforeach
        </div>
    </div>
@endsection
