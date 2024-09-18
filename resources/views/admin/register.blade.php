@extends('admin.auth_layout')

@section('form')
    <form action="{{ route('register') }}" method="post" class="form-outline p-2" enctype="multipart/form-data">
        @csrf
        <p>Please enter your information to Register your account</p>

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
@endsection
