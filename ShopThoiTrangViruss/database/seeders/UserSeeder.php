<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'hien',
            'email' => 'hien@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0123456789',
            'address' => 'Đ.Võ Văn Ngân, Phường Linh Chiểu, Quận Thủ Đức, Thành phố Hồ Chí Minh',
            'role' => '0',
        ]);

        DB::table('users')->insert([
            'name' => 'luan',
            'email' => 'luan@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0123456789',
            'address' => 'Đ.Võ Văn Ngân, Phường Linh Chiểu, Quận Thủ Đức, Thành phố Hồ Chí Minh',
            'role' => '0',
        ]);
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '1278912321',
            'address' => 'Thành phố Hồ Chí Minh',
            'role' => '1',
        ]);
    }
}
// Compare this snippet from ShopThoiTrangViruss/app/Models/User.php: