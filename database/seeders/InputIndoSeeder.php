<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\Regency;

class InputIndoSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = Http::get('https://raw.githubusercontent.com/Caknoooo/provinces-cities-indonesia/main/json/provinces.json')
            ->throw()  // fail early on HTTP errors
            ->json();

        foreach ($provinces as $prov) {
            Province::updateOrCreate(
                ['id' => $prov['id']],
                ['name' => $prov['province']]
            );
        }

        // 2) fetch and seed regencies
        $regencies = Http::get('https://raw.githubusercontent.com/Caknoooo/provinces-cities-indonesia/main/json/regencies.json')
            ->throw()
            ->json();

        foreach ($regencies as $reg) {
            Regency::updateOrCreate(
                ['id' => $reg['id']],
                [
                    'province_id' => $reg['province_id'],
                    'name' => $reg['regency']
                ]
            );
        }
    }
}
