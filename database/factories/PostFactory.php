<?php

namespace Database\Factories;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'imagen' => $this->copyImage(
                $this->faker->numberBetween(1,20).".jpg",
                $this->faker->uuid() . ".jpg"
            ),
            'user_id' => $this->faker->randomElement([1, 3, 4, 5, 6, 7, 8])
        ];
    }

    public function copyImage($origin, $destiny)
    {
        echo PHP_EOL.$origin;
        $imagenServidor = Image::make(public_path('assets_example') . '/' . $origin);
        $imagenServidor->fit(1000, 1000, null, 'center');
        $imagenServidor->save(public_path('uploads') . '/' . $destiny);
        unset($imagenServidor);

        return $destiny;
    }
}
