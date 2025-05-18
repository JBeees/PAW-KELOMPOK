<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodInfo>
 */
class FoodInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_sekolah = 27;
        $jumlah_siswa = 200;
        $jumlah_porsi = $jumlah_siswa;
        $kualitas_bagus = fake()->numberBetween(1, $jumlah_porsi);
        $kualitas_buruk = $jumlah_porsi - $kualitas_bagus;
        $startDate = "2024-01-01";
        $endDate = "2026-12-31";
        return [
            'id_sekolah' => $id_sekolah,
            'nama_pengirim' => fake()->name(),
            'phone_number' => fake()->e164PhoneNumber,
            'waktu' => fake()->time(),
            'tanggal' => fake()->dateTimeBetween($startDate, $endDate)->format('Y-m-d'),
            'jumlah_porsi' => $jumlah_porsi,
            'jumlah_siswa' => $jumlah_siswa,
            'kualitas_bagus' => $kualitas_bagus,
            'kualitas_buruk' => $kualitas_buruk,
            'dokumentasi' => fake()->imageUrl(400, 400, 'people', true),
            'catatan' => fake()->text(100),
        ];
    }
}
