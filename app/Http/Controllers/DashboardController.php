<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $blogs  = Blogs::get();
        $blogs_count  = Blogs::get()->count();
        $authors_count = User::get()->count();
        $categories_count = Categories::get()->count();

        $categories = Categories::with('blogs')->get();
        foreach ($categories as $cate) {
            $cate->blogs_num = $cate->blogs->count();
        }

        $authors = User::get();
        foreach ($authors as $author) {
            $author->blogs_num = $blogs->where('author_id', $author->id)->count();
        }
        // return $authors;
        return view('admin.index', compact(
            'blogs_count',
            'authors_count',
            'categories_count',
            'categories',
            'authors'
        ));
    }
}
