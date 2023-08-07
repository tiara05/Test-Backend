<?php

namespace Database\Seeders;

use App\Models\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Comment = [
            [
                'names'     => 'tiara', 
                'comment'   => 'Sangat Setuju',
                'news_id'   => '1'
            ],
            [
                'names'     => 'anonymous', 
                'comment'   => 'Wow beritanya menarik banget yak',
                'news_id'   => '1'
            ]
        ];

        foreach ($Comment as $key => $value) {
            Comment::create($value);
        }
    }
}
