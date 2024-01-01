<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleComment;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(100)
            ->longerContent(20)
            ->slugFromTitle()
            ->has(ArticleComment::factory()->count(20), 'comments')
            ->create();
    }
}
