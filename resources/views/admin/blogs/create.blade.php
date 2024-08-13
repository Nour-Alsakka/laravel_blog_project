@extends('admin.layout')

@section('main')
    <div class="card my-4">
        <div class="card-header text-center">Add New Blog</div>
        <div class="card-body">
            <form action="{{ route('dashboard.blogs.store') }}">
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="content">content:</label>
                    <input type="text" id="content" name="content" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
