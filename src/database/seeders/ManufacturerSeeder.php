<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;
use App\Models\Product;

class ManufacturerSeeder extends Seeder
{
    public function run()
    {
        Manufacturer::factory()
            ->count(20)
            ->create()
            ->each(function (Manufacturer $manufacturer) {
                Product::factory()
                    ->count(20)
                    ->create([
                        'manufacturer_id' => $manufacturer->id,
                    ]);
            });
    }
}
