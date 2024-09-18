<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];
    // public function posts()
    // {
    //     return $this->hasMany(categoriesPosts::class, 'category_id', 'id');
    // }
    public function blogs()
    {
        return $this->belongsToMany(Blogs::class);
    }
}
