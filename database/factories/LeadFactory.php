<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone_number' => fake()->e164PhoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'lead_text' => fake()->paragraph(1),
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
            'status_id' => fake()->numberBetween(1, 3)
        ];
    }
}
