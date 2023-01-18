<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        
        $this->call([
            EnumSeeder::class,
            SettingSeeder::class,
            PrivilegeSeeder::class,
            UserSeeder::class,
            PaymentSeeder::class,
            SystemSeeder::class,
            EntitySeeder::class,
            NoticeboardSeeder::class,
        ]);
    }
}
