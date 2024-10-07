<?php

namespace Database\Seeders;

use App\Models\BlogsCategories;
use App\Models\Categories;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'description' => 'admin is the owner of this site',
        ]);

        $categories = ['reading', 'cook', 'sport', 'life_style'];
        foreach ($categories as $category) {
            Categories::create([
                'name' => $category,
                'image' => 'image.jpg',
            ]);
        }

        $this->call([
            UserSeeder::class,
        ]);

        $this->call([
            BlogsCategoriesSeeder::class,
        ]);

        $this->call([
            RoleSeed::class,
        ]);
    }
}
