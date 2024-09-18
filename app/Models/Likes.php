<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $fillable = ['users_id', 'blogs_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blogs::class, 'blogs_id');
    }
}
