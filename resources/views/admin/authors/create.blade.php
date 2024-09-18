@extends('admin.layout')

@section('cssAndJs')
    <link rel="stylesheet" href="{{ asset('filepond/filepond.min.css') }}">

    <script src="{{ asset('filepond/filepond.min.js') }}"></script>
@endsection

@section('main')
    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li style="color: red;font-size: 28px">{{ $error }}</li>
            @endforeach
        </ol>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<h2>Add Author</h2>
    {{-- <form action="{{route('dashboard.authors.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header text-center bg-secondary text-white">
            <h5>Add New Author</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Author Bio</label>
                <textarea class="form-control" name="des" id="des" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Author Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-secondary w-50">Send</button>
            </div>
        </div>
    </div>
</form> --}}
    <form action="{{ route('dashboard.authors.store') }}" method="post" class="form-outline p-2" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="name" name="name" id="name" class="form-control">
            {{-- @error('name')
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                    @enderror --}}
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
                <div class="error text-danger">{{ $errors->first('email') }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <div class="error text-danger">{{ $errors->first('password') }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label"> Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Bio:</label>
            <input type="text" name="description" id="description" class="form-control">
            @error('description')
                <div class="error text-danger">{{ $errors->first('description') }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-secondary">signup</button>

    </form>
    <script>
        const inputElement = document.querySelector('input[id="image"]');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                url: '/dashboard/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endsection
