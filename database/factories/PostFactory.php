<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(), // Génère un titre aléatoire
            'content' => $this->faker->paragraph(), // Génère un contenu aléatoire
            'status' => $this->faker->randomElement(['draft', 'published']), // Statut aléatoire
            'author' => $this->faker->name(), // Nom de l'auteur aléatoire
        ];
    }
}
