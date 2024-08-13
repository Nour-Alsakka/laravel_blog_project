<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::get();
        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!File::exists(storage_path('app/public/media'))) {
            File::makeDirectory(storage_path('app/public/media'));
        }

        $file = $request->image;
        $name = $file->hashName();
        $filename = time() . '.' . $name;
        $file->storeAs('public/media/', $filename);

        $check =  Authors::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $filename,
        ]);
        if ($check) return back()->with('success', 'The author has inserted successfully.');
        else return back()->withErrors(['errors', 'something happend']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $authors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Authors $authors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $authors)
    {
        //
    }
}
