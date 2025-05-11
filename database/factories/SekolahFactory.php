<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sekolah;
use App\Models\Regency;
use App\Models\Province;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sekolah>
 */
class SekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sekolah::class;
    public function definition(): array
    {
        static $number = 21;
        $regency = Regency::inRandomOrder()->first();

        return [
            'id' => $number++,
            'name' => $this->faker->company . ' School',
            'phone_number' => $this->faker->e164PhoneNumber,
            'address' => $this->faker->address,
            'province' => Province::find($regency->province_id)->name,
            'city' => $regency->name,
            'total_student' => $this->faker->numberBetween(100, 2000),
        ];
    }
}