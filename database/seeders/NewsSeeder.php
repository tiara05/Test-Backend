<?php

namespace Database\Seeders;

use App\Models\News;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $News = [
            [
                'category_id'   => '1', 
                'news_content'  => 'Bisnis di era 4.0 ini terus berkembang cepat dengan memanfaatkan teknologi yang terus berkembang'
            ],
            [
                'category_id'   => '2',
                'news_content'  => 'Makanan sekarang banyak mengandung micin yang bisa mempengaruhi kesehatan anak jaman sekarang.'
            ]
        ];

        foreach ($News as $key => $value) {
            News::create($value);
        }
    }
}
