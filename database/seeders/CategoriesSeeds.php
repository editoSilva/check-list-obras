<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ["name" => "Pequena"],
            ["name" => "Média"],
            ["name" => "Grande"]
        ];

        Category::insert($categories);
    }
}
