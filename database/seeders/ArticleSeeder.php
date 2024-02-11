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
        Article::factory()->count(5)
            ->longerContent(5)
            ->slugFromTitle()
            ->has(ArticleComment::factory()->count(10), 'comments')
            ->create();
    }
}
