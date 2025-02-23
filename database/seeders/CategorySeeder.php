<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Seed the categories table.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 categories
        Category::factory()->count(10)->create();
    }
}
