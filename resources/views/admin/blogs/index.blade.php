@extends('admin.layout')

@section('main')
    <a class="btn btn-primary" href="{{ route('dashboard.blogs.create') }}">add blog</a>
    {{-- <a class="btn" href="{{ url('dashboard/blogs/create') }}">add blog</a> --}}
@endsection
