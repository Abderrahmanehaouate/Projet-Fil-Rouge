<?php

namespace Database\Factories;
use App\Models\Compaign;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compaign>
 */
class CompaignFactory extends Factory
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
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'excerpt' => '<p>' . implode('</p><p>' , $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>' , $this->faker->paragraphs(8)) . '</p>',
            'country' => $this->faker->sentence(),
            'address' => $this->faker->sentence(),
            'city' => $this->faker->sentence(),
            'region' => $this->faker->sentence(),
            'postal' => $this->faker->sentence(),

        ];
    }
}
