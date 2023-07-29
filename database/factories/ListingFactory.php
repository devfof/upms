<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'contributors' => 'laravel, api, backend',
            'project_subject' => $this->faker->company(),
            'final_Submission' => '',
            'status' => 1,
            'description' => $this->faker->paragraph(5),
        ];
    }
}
