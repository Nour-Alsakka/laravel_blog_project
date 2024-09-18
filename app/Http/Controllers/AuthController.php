<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function register()
    {
        return view('admin.register');
    }


    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:4',
            'description' => 'required|min:10',
        ]);

        if (!File::exists(storage_path('app/public/media'))) {
            File::makeDirectory(storage_path('app/public/media'));
        }
        $file = $request->image;
        if ($file) {
            $name = $file->hashName();
            $filename = time() . '.' . $name;
            $file->storeAs('public/media/', $filename);
        } else {
            $filename = '';
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'description' => $request->description,
            'image' => $filename,
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect('/dashboard/posts')
            ->withSuccess('You have successfully registered & logged in!');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function login_check(LoginRequest $request)
    {

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect('/dashboard/posts');
        } else {
            return 'wrong data';
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
