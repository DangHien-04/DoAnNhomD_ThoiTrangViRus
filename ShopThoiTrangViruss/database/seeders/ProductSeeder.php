<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id_category' => '1',
            'id_manufacturer' => '1',
            'name_product' => 'Áo dài cách tân',
            'quantity_product' => '960',
            'price_product' => '3090000',
            'image_address_product' => '1744190738.jpg',
            'describe_product' => 'Áo dài cách tân Bạch Vũ 2025 , áo dài 4 tà dáng xuông chất liệu toan tơ thêu họa tiết hoa phối quần phi',
            'specifications' => 'Việt Nam.;Dài áo 120cm lớp lót 1m25cm , quần 100cm;Áo hồng , quần hồng nhạt;XS-S-M-L-XL-XXL;Áo dài cách tân;Áo dài thiết kế;Lớp ngoài+lót lụa habutai , quần chất liệu lụa;',
        ]);

        DB::table('products')->insert([
            'id_category' => '2',
            'id_manufacturer' => '3',
            'name_product' => 'Áo dài cách tân',
            'quantity_product' => '960',
            'price_product' => '3090000',
            'image_address_product' => '1744190897.jpg',
            'describe_product' => 'Áo dài cách tân Bạch Vũ 2025 , áo dài 4 tà dáng xuông chất liệu toan tơ thêu họa tiết hoa phối quần phi',
            'specifications' => 'Việt Nam.;Dài áo 120cm lớp lót 1m25cm , quần 100cm;Áo hồng , quần hồng nhạt;XS-S-M-L-XL-XXL;Áo dài cách tân;Áo dài thiết kế;Lớp ngoài+lót lụa habutai , quần chất liệu lụa;',
        ]);

        DB::table('products')->insert([
            'id_category' => '1',
            'id_manufacturer' => '2',
            'name_product' => 'Áo dài cách tân',
            'quantity_product' => '960',
            'price_product' => '3090000',
            'image_address_product' => '1744190983.jpg',
            'describe_product' => 'Áo dài cách tân Bạch Vũ 2025 , áo dài 4 tà dáng xuông chất liệu toan tơ thêu họa tiết hoa phối quần phi',
            'specifications' => 'Việt Nam.;Dài áo 120cm lớp lót 1m25cm , quần 100cm;Áo hồng , quần hồng nhạt;XS-S-M-L-XL-XXL;Áo dài cách tân;Áo dài thiết kế;Lớp ngoài+lót lụa habutai , quần chất liệu lụa;',
          
        ]);
    }
}
