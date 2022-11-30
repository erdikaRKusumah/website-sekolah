<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $count = 1;
        $count++;
        return [
            'user_id' => $count,
            'full_name' => $this->faker->name(),
            'gender' => 'L',
            'birth_date' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->unique()->randomNumber(),
            'image' => 'default.png'
        ];
    }
}
