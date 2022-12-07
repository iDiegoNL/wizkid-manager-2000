<?php

namespace Database\Factories;

use App\Enums\WizkidRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wizkid>
 */
class WizkidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userRoles = WizkidRole::cases();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'role' => $userRoles[array_rand($userRoles)]->value,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's fired_at should be set.
     *
     * @return static
     */
    public function fired()
    {
        return $this->state(fn (array $attributes) => [
            'fired_at' => now(),
        ]);
    }
}
