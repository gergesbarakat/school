<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
         'address'=> fake()->streetAddress(),
        'postal_code'=> fake()->postcode(),
        'country'=> fake()->country(),
        'state'=> fake()->city(),
        'area'=> fake()->citySuffix(),
        'manager_name'=> fake()->name(),
        'phone'=> fake()->e164PhoneNumber(),
        'email'=> fake()->safeEmailDomain(),
        'logo'=> fake()->imageUrl(),
           ];
    }
}
