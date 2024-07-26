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
            'Grandmaster Flash',
            'Run-D.M.C.',
            'LL Cool J',
            'Public Enemy',
            'Eric B. & Rakim',
            'Salt-N-Pepa',
            'KRS-One',
            'Slick Rick',
            'Big Daddy Kane',
            'N.W.A',
            'Beastie Boys',
            'Ice-T',
            'MC Lyte',
            'Queen Latifah',
            'De La Soul',
            'A Tribe Called Quest',
            'Biz Markie',
        ];

        return [
            'name' => $this->faker->randomElement($oldSchoolHipHopArtists),
        ];
    }
}
