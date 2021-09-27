<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Aliansyah',
                'username' => 'aliansyaah',
                'email' => 'aliansyaah@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => Str::random(40),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Regina',
                'username' => 'reginaa',
                'email' => 'reginaa@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => Str::random(40),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
