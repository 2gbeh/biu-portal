<?php

namespace Database\Seeders;

use SchemaHelper;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = $_ENV;

        $collection = $arr = [];
        foreach ($data as $name => $value) {
            $arr = ['name' => $name, 'value' => $value];
            array_push($collection, $arr);
        }

        SchemaHelper::insertMultiple('settings', $collection);
    }
}
