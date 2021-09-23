<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(JabatanSeeder::class);

        // Call factory
        // 2 adalah jumlah data yang ingin dibuat
        factory(App\Jabatan::class, 2)->create();
    }
}
