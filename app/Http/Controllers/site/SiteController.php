<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Blogs;
use App\Models\Books;
use App\Models\Categories;
use App\Models\categoriesPosts;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {

        // add role to user
        $owner = Role::where('name', 'owner')->first();
        $user = User::where('email', 'admin@admin.com')->first();
        $user->removeRole($owner);
        $user->addRole($owner);

        $categories = Categories::with(['blogs' => function ($q) {
            $q->limit(4);
        }])->get();
        // $categories = Categories::with('blogs')->get();
        // $categories = Categories::get();

        $latest_posts = Blogs::latest()->limit(3)->get();
        $popular_posts = Blogs::limit(3)->get();

        $slider_posts = Blogs::latest()->where('slider', 1)->get();

        // $posts = Blogs::with('categories')->get();

        // return $categories;

        return view('site.index', compact('latest_posts', 'popular_posts', 'categories', 'slider_posts'));
    }

    public function news_details(string $id)
    {
        // $categories = Categories::with('blogs')->get();
        $categories = Categories::with(['blogs' => function ($query) {
            $query->limit(4);
        }])->get();

        $latest_posts = Blogs::latest()->limit(3)->get();
        $popular_posts = Blogs::limit(3)->get();


        $blog = Blogs::with('author', 'categories')->find($id);
        return view('site.details', compact('blog', 'latest_posts', 'popular_posts', 'categories'));
    }

    public function category_posts(string $id)
    {
        // $categories = Categories::with('blogs')->get();

        $categories = Categories::with(['blogs' => function ($q) {
            $q->limit(4);
        }])->get();

        $latest_posts = Blogs::latest()->limit(3)->get();
        $popular_posts = Blogs::limit(3)->get();

        $category = Categories::with('blogs')->find($id);
        // return $category;
        // $categories = Categories::with('blogs')->where('id', $id);
        return view('site.category_posts', compact('category', 'categories', 'latest_posts', 'popular_posts'));
    }
}
