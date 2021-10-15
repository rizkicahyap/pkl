<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'validasi' => 'VALID',
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
                'password' => bcrypt('a123456')
            ],
            [
                'username' => 'spradmin',
                'name' => 'Super Admin',
                'email' => 'spradmin@gmail.com',
                'level' => 'superadmin',
                'validasi' => 'VALID',
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
                'password' => bcrypt('a123456')
            ],
            [
                'username' => 'direksi',
                'name' => 'Direksi',
                'email' => 'direksi@gmail.com',
                'level' => 'direksi',
                'validasi' => 'VALID',
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
                'password' => bcrypt('123456')
            ],
            [
                'username' => 'user',
                'name' => 'User 1',
                'email' => 'user@gmail.com',
                'level' => 'user',
                'validasi' => 'VALID',
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
                'password' => bcrypt('123456')

            ],
            [
                'username' => 'user2',
                'name' => 'User 2',
                'email' => 'user2@gmail.com',
                'level' => 'user',
                'validasi' => 'VALID',
                'req_akses' => 'NORMAL',
                'akses' => 'BELUM',
                'password' => bcrypt('234567')

            ]
            ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
