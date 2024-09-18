<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // public function search(Request $request)
    // {
    //     $query = $request->query('query');
    //     // perform your search logic here
    // }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $blogs = Blogs::where('title', 'like', '%' . $query . '%')
        ->orwhere('content', 'like', '%' . $query . '%')->get();
        return response()->json($blogs);
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $blogs = Blogs::where('title', 'like', '%' . $query . '%')->get();
    //     return view('site.index', compact('blogs'));
    // }

    // public function search(Request $request)
    // {
    //     $blogs = Blogs::where('title', 'like', '%' . $request->query . '%');
    //     // return response($blogs);
    //     return response()->json($blogs->get());
    // }

    // public function search($key)
    // {
    //     $posts = Blogs::where('title','like','%'.$key.'%');
    //     return response()->json($posts->get());
    // }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     // Your search logic here
    //     // Return the search results as a response
    // }
}
