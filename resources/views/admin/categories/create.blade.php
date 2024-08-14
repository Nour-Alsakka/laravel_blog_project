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
        <div class="card-header text-center">Add New category</div>
        <div class="card-body">
            <form action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', '') }}">
                </div>
                <div class="mb-3">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" class="form-control" value="{{ old('image', '') }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
