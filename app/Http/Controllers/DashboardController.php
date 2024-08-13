<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $j = 'Welcome to Dashboard';
        return view('admin.index', compact('j'));
    }
}
