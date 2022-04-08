<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->name(),
            'slug' => $this->faker->unique()->slug(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
