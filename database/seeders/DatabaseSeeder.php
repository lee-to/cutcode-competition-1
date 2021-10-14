<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create();
        Post::factory(1000)->create();
        Rating::factory(10000)->create();
    }
}
