<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Authors;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $authors = Authors::get();
        $blogs  = Blogs::get();
        $authors = User::get();
        foreach ($authors as $author) {
            $author->blogs_num = $blogs->where('user_id', $author->id)->count();
        }

        return view('admin.authors.index', compact('authors'));
    }
    public function author_blogs($id)
    {
        $blogs  = Blogs::where('user_id', $id)->get();
        $author = User::where('id', $id)->first();
        return view('admin.authors.author_blogs', compact('blogs', 'author'));
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
        try {

            $request->validate([
                'name' => 'required|string|max:250',
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|min:4',
                'description' => 'required|min:10',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'description' => $request->description,
                'image' => $request->image,
            ]);

            return back()->with('success', 'The Author has inserted successfully');
        } catch (Exception $e) {

            return back()->withErrors(['error' => 'something happend']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author = User::find($id);

        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        // dd($author);
        $author = User::find($id);
        $author->name = $request->name;
        $author->description = $request->des;

        if ($request->image != null) {
            $author->image = $request->image;
        }

        $author->save();
        return redirect('/dashboard/authors')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = User::find($id);
        Blogs::where('user_id', $id)->delete();

        $author->delete();
        return back();
        // return redirect('/dashboard/authors');
    }
}
