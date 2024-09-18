<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriesPosts extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'post_id',
    //     'category_id',
    // ];

    // public function posts()
    // {
    //     return $this->belongsTo(Blogs::class, 'post_id', 'id');
    // }

    // public function categories()
    // {
    //     return $this->belongsTo(Categories::class, 'category_id', 'id');
    // }
}
