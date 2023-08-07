<?php

namespace Database\Seeders;

use App\Models\Categories;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categories = [
            [
                'category_name' => 'Health', 
            ],
            [
                'category_name' => 'Food',
            ]
        ];

        foreach ($Categories as $key => $value) {
            Categories::create($value);
        }
    }
}
