<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS files --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- JS files --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <title>Login</title>
</head>

<body>

    <form action="{{ route('login_check') }}" method="post" class="form-outline p-2">
        @csrf
        <div class="card" style="max-width:500px;margin:auto">
            <div class="card-header text-center">Login Page</div>
            <div class="card-body">
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
                <button type="submit" class="btn btn-secondary">Login</button>
            </div>
        </div>
    </form>

</body>

</html>
