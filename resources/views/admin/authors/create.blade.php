@extends('admin.layout')
@section('main')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li style="color: red;font-size: 28px">{{ $error }}</li>
            @endforeach
        </ol>
    @endif

    <div class="card my-4">
        <div class="card-header text-center">Add New Blog</div>
        <div class="card-body">
            <form action="{{ route('dashboard.blogs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', '') }}">
                </div>
                <div class="mb-3">
                    <label for="content">content:</label>
                    <textarea type="text" id="content" name="content" class="form-control" value="{{ old('content', '') }}"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" class="form-control" value="{{ old('image', '') }}">
                </div>
                <div class="mb-3">
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" class="form-control"
                        value="{{ old('author', '') }}">
                </div>
                <div class="mb-3">
                    <label for="slider">Slider:</label>
                    <select name="slider" id="slider" value="{{ old('slider', '') }}">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
