<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'content' => fake()->paragraph(5),
            'slug' => fake()->slug(),
            // 'article_category_id' => ArticleCategory::inRandomOrder()->first()->id

            // 'article_category_id' => ArticleCategory::inRandomOrder()->first()->id ?? ArticleCategory::factory()->create()->id,
            'article_category_id' => ArticleCategory::inRandomOrder()->first()->id ?? ArticleCategory::firstOrCreate(['name' => 'Default Category'])->id,

        ];
    }

    public function longerContent($count = 10): static
    {
        return $this->state(fn (array $attritbutes) => [
            'content' => fake()->paragraph($count),
        ]);
    }

    public function slugFromTitle(): static
    {
        return $this->state(fn (array $attributes) => [
            'slug' => Str::slug($attributes['title']),
        ]);
    }
}
