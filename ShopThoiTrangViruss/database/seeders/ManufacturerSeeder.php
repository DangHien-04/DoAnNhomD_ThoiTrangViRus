<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name_manufacturer' => 'Ao dai',
            'image_manufacturer' => '1714729075.webp',
        ]);

        DB::table('manufacturers')->insert([
            'name_manufacturer' => 'So mi',
            'image_manufacturer' => '1714729152.webp',
        ]);
        
        DB::table('manufacturers')->insert([
            'name_manufacturer' => 'Tre em',
            'image_manufacturer' => '1714729195.webp',
        ]);
    }
}
