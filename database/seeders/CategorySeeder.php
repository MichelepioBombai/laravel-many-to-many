<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $labels = ["Bootstrap", "Tailwind", "Vue", "Laravel", "PHPMyAdmin"];

      foreach($labels as $label) {
        $category = new Category();
        $category->label = $label;
        $category->color = $faker->hexColor();
        $category->save();
      }
    }
}