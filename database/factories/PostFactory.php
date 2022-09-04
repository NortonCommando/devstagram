<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(5),
            'descripcion' => $this->faker->sentence(20),
            'imagen' =>
            $this->faker->randomElement([
                '1c21c93c-eba9-484a-bf4f-66392b072cc2.jpg',
                '1fb394f2-ab3e-4b3b-957a-18a4b3475b0e.jpg',
                '3964eafb-3996-40aa-8d64-b0240887d5f8.jpg',
                'a846076b-4323-47f9-9900-e86d517ac4f6.jpg',
            ]),
            'user_id' => $this->faker->randomElement([1, 3, 4, 5, 6, 7, 8])
        ];
    }
}
