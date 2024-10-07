<?php

namespace Database\Seeders;

use App\Models\BlogsCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogsCategories::factory()
            ->count(20)
            ->create();

    }
}
