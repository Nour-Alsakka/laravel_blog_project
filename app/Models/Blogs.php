<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
        'slider',
    ];
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }
}
