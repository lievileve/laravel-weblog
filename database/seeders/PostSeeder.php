<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void    
    {
        $posts = Post::factory()->count(10)->create();

        $categories = Category::all();

        $posts->each(function ($post) use ($categories) {
            $randomCategories = $categories->random(rand(1, 3));
            $post->categories()->attach($randomCategories);
        });
    }
}
