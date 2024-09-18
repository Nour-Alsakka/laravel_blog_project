<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class LikeBlog extends Component
{
    public $blog;
    public $likes;

    public function mount($blog)
    {
        $this->blog = $blog;
        $this->likes = $blog->likes()->where('users_id', Auth::id())->exists();
    }
    public function like()
    {
        if (Auth::check()) {
            if ($this->likes) {
                $this->blog->likes()->where('users_id', Auth::id())->delete();
                $this->likes = false;
            } else {
                $this->blog->likes()->create(['users_id' => Auth::id()]);
                $this->likes = true;
            }
        } else {
            // Handle guest user
        }
    }

    public function render()
    {
        return view('livewire.like-blog');
    }
}
