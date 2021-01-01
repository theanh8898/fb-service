<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234567a'),
            'phone' => '0866868145',
            'amount' => 1000000,
            'role' => 1,
            'created_at' => '2020-01-01',
        ]);

        DB::table('users')->insert([
            'name' => 'The Anh',
            'email' => 'theanh8898@admin.com',
            'password' => bcrypt('11111111'),
            'phone' => '0866868145',
            'amount' => 1000000,
            'role' => 2,
            'created_at' => '2020-01-01',
        ]);
    }
}
