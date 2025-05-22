<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InfoLaporan>
 */
class InfoLaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipe_laporan' => fake()->randomElement(['Aspirasi', 'Keluhan', 'Laporan']),
            'email' => fake()->unique()->safeEmail(),
            'deskripsi' => fake()->sentence(),
            'image' => fake()->imageUrl(), // or use faker->imageUrl() for random image
        ];
    }
}
