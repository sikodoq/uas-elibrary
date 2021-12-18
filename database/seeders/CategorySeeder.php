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
        $data = ['Programming', 'Antologi', 'Ensiklopedi', 'Comic', 'Novel', 'Video'];
        foreach ($data as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
