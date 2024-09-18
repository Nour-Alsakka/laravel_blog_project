<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'author_id',
        'slider',
    ];
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }
}
