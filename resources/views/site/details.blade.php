@extends('site.layouts.layout')

@section('main')
    <div class="container mb-4" style="padding-top: 76px">
        <img src="{{ url('storage/media/' . $blog->image) }}" alt="" style="width:100%;height:70vh;object-fit:cover">
        <div class="py-3">
            @if ($blog->author->image)
                <img src="{{ url('storage/media/' . $blog->author->image) }}"
                    style="margin-right:4px;width: 40px; height:40px;object-fit:cover;" alt="">
            @else
                <img class="img-fluid " src="{{ asset('images/user.png') }}"
                    style="margin-right:4px;width: 40px; height:40px;object-fit:cover;">
            @endif
            {{ $blog->author->name }}

            <span class="mx-2 font-bold">|</span>
            {{ $blog->created_at }}

            <span class="mx-2 font-bold">|</span>
            @foreach ($blog->categories as $category)
                <span class="bg-secondary text-white p-2" style="border-radius: 6px">{{ $category->name }}</span>
            @endforeach
        </div>
        <h2 class="mb-4">{{ $blog->title }}</h2>
        <p>{!! $blog->content !!}</p>
        <livewire:like-blog :blog="$blog" />

    </div>
@endsection
