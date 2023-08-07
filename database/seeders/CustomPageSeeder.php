<?php

namespace Database\Seeders;

use App\Models\Pages;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Pages = [
            [
                'custom_url'   => 'https://detik.com/page/Berita-Bisnis', 
                'page_content'  => 'Perkembangan bisnis 2023'
            ],
            [
                'custom_url'   => 'https://detik.com/page/Berita-Teknologi',
                'page_content'  => 'Perkembangan teknologi 4.0'
            ]
        ];

        foreach ($Pages as $key => $value) {
            Pages::create($value);
        }
    }
}
