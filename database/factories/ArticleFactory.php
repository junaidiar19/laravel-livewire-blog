<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $title = fake()->sentence(5);

        return [
            'slug' => str()->slug($title),
            'title' => $title,
            'is_published' => 1,
            'cover' => fake()->imageUrl(800, 550, 'article'),
            'body' => fake()->text(500),
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => 1,
        ];
    }
}
