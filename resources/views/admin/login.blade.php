@extends('admin.auth_layout')

@section('form')
    <form method="post" action="{{ route('login_check') }}">
        @csrf
        <p>Please login to your account</p>


        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example11">Username</label>
            <input type="email" id="email" name="email" class="form-control" placeholder=" email address"
                value="{{ old('email', '') }}" />
            @error('email')
                <div class="error text-danger">{{ $errors->first('email') }}</div>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example22">Password</label>
            <input type="password" id="password" name="password" class="form-control" />
            @error('password')
                <div class="error text-danger">{{ $errors->first('password') }}</div>
            @enderror
        </div>

        <div class="text-center pt-1 pb-1">
            <button class="btn btn-primary gradient-custom-2 mb-3 py-3 px-5" type="submit">Log in</button>
        </div>



    </form>
@endsection
