<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=> 'Colegio32',
            'slug'=> 'Colegio32',
        ]);
        Category::create([
            'name'=> 'Colegio32',
            'slug'=> 'Colegio32',
        ]);
        Category::create([
            'name'=> 'Colegio32',
            'slug'=> 'Colegio32',
        ]);
        Category::create([
            'name'=> 'General',
            'slug'=> 'general',
        ]);

    }
}
