<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Provider\Address;


class User_DomicilioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, User::count()),
            'domicilio' => Str::random(20),
            'numero_exterior' => Str::random(4),
            'colonia' => Str::random(12),
            'cp' => Address::postcode(),
            'ciudad' => Address::citySuffix(),
        ];
    }
}
