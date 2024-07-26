<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $oldSchoolHipHopArtists = [
            'Run-D.M.C.',
            'Grandmaster Flash',
            'LL Cool J',
            'Public Enemy',
            'Eric B. & Rakim',
            'KRS-One',
            'Beastie Boys',
            'Ice-T',
            'N.W.A',
            'A Tribe Called Quest'
        ];

        return [
            'name' => $this->faker->randomElement($oldSchoolHipHopArtists),
        ];
    }
}
