<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticleCategory::create(['name' => 'Olah raga']);
        ArticleCategory::create(['name' => 'Politik']);
        ArticleCategory::create(['name' => 'Sesial']);
        ArticleCategory::create(['name' => 'Ekonomi']);
        ArticleCategory::create(['name' => 'Teknologi']);
        ArticleCategory::create(['name' => 'Hiburan']);
    }
}
