<?php

namespace Database\Factories;

use App\Enums\PublishStatusEnum;
use App\Models\Country;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'country_id' => Country::factory(),
            'province_id' => Province::factory(),
            'name' => $this->faker->streetName(),
            'description' => $this->faker->text(40),
            'image' => UploadedFile::fake()->image('image.jpg'),
            'slug' => $this->faker->slug(),
        ];
    }

    public function yes()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => PublishStatusEnum::STATUS['Yes'],
            ];
        });
    }

    public function no()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => PublishStatusEnum::STATUS['No'],
            ];
        });
    }
}