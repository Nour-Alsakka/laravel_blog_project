<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blogs::get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        if (!File::exists(storage_path('app/public/media'))) {
            File::makeDirectory(storage_path('app/public/media'));
        }

        $file = $request->image;
        $name = $file->hashName();
        $filename = time() . '.' . $name;
        $file->storeAs('public/media/', $filename);

        $check =  Blogs::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => 1,
            'image' => $filename,
            'slider' => $request->slider,
        ]);
        if ($check) return back()->with('success', 'The blog has inserted successfully.');
        else return back()->withErrors(['errors', 'something happend']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogs $blogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blogs)
    {
        //
    }
}
