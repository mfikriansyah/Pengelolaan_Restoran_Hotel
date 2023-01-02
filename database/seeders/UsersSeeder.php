<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 50 ; $i++)
        {
            DB::table('users')->insert([
                'username' => 'kamar_' . $i,
                'password' => Hash::make('12345'),
                'roles_id' => '2'
            ]);
        }
    }
}
