<?php

namespace Database\Factories;
use App\Models\Compaign;
use App\Models\User;
use App\Models\Soutien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soutien>
 */
class SoutienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [

                'compaign_id' => Compaign::factory(),
                'user_id' => User::factory(),
                'amount' => $this->faker->randomDigit(3)
    
            ];
    }
}
