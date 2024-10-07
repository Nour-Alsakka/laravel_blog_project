<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Authors;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\categoriesPosts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $blogs = Blogs::leftJoin('authors', 'authors.id', '=', 'blogs.user_id')
        //     ->select('blogs.*', 'authors.name as author_name')
        //     ->get();

        if (Auth::user()->hasRole('owner')) {
            $blogs = Blogs::with('author')->get();
        } else {
            $blogs = Blogs::with('author')->where('user_id', Auth::user()->id)->get();
        }

        return  View('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $authors = Authors::get();
        $categories = Categories::get();
        // $authors = DB::table('authors')->get();

        return  View('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {

        try {

            $blog = Blogs::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $request->user()->id,
                'image' => $request->image,
                'slider' => $request->slider,
            ]);
            // Blogs::create($request->all());

            foreach ($request->categories as $category) {
                DB::table('blogs_categories')->insert([
                    'blogs_id' => $blog->id,
                    'categories_id' => $category,
                ]);
            }
            // if ($check) {
            // foreach ($request->categories as $category) {
            //     categoriesPosts::create([
            //         'post_id' => $check->id,
            //         'category_id' => $category,
            //     ]);
            // }
            return back()->with('success', 'The Blog has inserted successfully');
            // }
        } catch (Exception $e) {

            return back()->withErrors(['error' => 'something happend']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blogs::find($id);
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blogs::with('author', 'categories')->find($id);
        $authors = User::get();
        $categories = Categories::get();
        if (Auth::user()->hasRole('owner') || Auth::user()->id == $blog->author->id) {
            // return Auth::user()->id == $blog->author->id;

            // $post_categories = categoriesPosts::where('post_id', $id)->get();
            // return $post_categories;
            // return $blog->categories->pluck('id')->toArray();
            // return $blog;
            return view('admin.blogs.edit', compact('blog', 'authors', 'categories'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        // dd($blog);
        // dd($blog->title);
        // dd($request->title);

        $blog = Blogs::find($id);

        $blog->title = $request->title;
        $blog->content = $request->content;
        // $blog->user_id = $request->user_id;
        $blog->slider = $request->slider;

        if ($request->image != null) {
            $blog->image = $request->image;
        }

        DB::table('blogs_categories')->where('blogs_id', $id)->delete();

        foreach ($request->categories as $category) {
            DB::table('blogs_categories')->insert([
                'blogs_id' => $id,
                'categories_id' => $category,
            ]);
        }

        $blog->save();
        return back()->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blogs::find($id);

        $blog->delete();
        // return view('admin.posts.index');
        return back();
    }
}
