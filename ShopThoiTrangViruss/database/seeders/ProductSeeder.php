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
            'describe_product' => 'Áo dài cách tân Bạch Vũ 2025, áo dài 4 tà dáng xuông chất liệu toan tơ thêu họa tiết hoa phối quần phi',
            'specifications' => 'Việt Nam.;Dài áo 120cm lớp lót 1m25cm, quần 100cm;Áo hồng, quần hồng nhạt;XS-S-M-L-XL-XXL;Áo dài cách tân;Áo dài thiết kế;Lớp ngoài+lót lụa habutai, quần chất liệu lụa;',
            'sizes' => 'XS,S,M,L,XL,XXL', // Thêm kích thước
            'colors' => 'Hồng,Đỏ,Xanh,Vàng,Trắng,Đen', // Thêm màu sắc
        ]);

        DB::table('products')->insert([
            'id_category' => '2',
            'id_manufacturer' => '2',
            'name_product' => 'Áo dài cách tân cao cấp',
            'quantity_product' => '500',
            'price_product' => '4090000',
            'image_address_product' => '1744190897.jpg',
            'describe_product' => 'Áo dài cách tân cao cấp với chất liệu lụa mềm mại, thiết kế tinh tế phù hợp cho các dịp lễ hội',
            'specifications' => 'Việt Nam.;Dài áo 130cm lớp lót 1m30cm, quần 110cm;Áo xanh, quần trắng;S-M-L-XL;Áo dài cách tân;Áo dài thiết kế;Lụa cao cấp;',
            'sizes' => 'S,M,L,XL', // Thêm kích thước
            'colors' => 'Xanh,Trắng,Đen', // Thêm màu sắc
        ]);

        DB::table('products')->insert([
            'id_category' => '3',
            'id_manufacturer' => '3',
            'name_product' => 'Áo dài thiết kế đặc biệt',
            'quantity_product' => '300',
            'price_product' => '5090000',
            'image_address_product' => '1744190983.jpg',
            'describe_product' => 'Áo dài thiết kế đặc biệt với họa tiết thêu tay, chất liệu cao cấp, phù hợp cho các sự kiện quan trọng',
            'specifications' => 'Việt Nam.;Dài áo 140cm lớp lót 1m40cm, quần 120cm;Áo đỏ, quần đen;M-L-XL-XXL;Áo dài thiết kế;Áo dài cao cấp;Lụa thêu tay;',
            'sizes' => 'M,L,XL,XXL', // Thêm kích thước
            'colors' => 'Đỏ,Đen,Vàng', // Thêm màu sắc
        ]);
    }
}