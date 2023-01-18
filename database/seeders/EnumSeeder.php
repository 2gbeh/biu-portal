<?php

namespace Database\Seeders;

use EnumHelper;
use Illuminate\Database\Seeder;
use SchemaHelper;


class EnumSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $protected;

    public function __construct()
    {
        $this->prefix = 'enum_';
    }

    public function run()
    {
        $res = [];
        $data = $this->factory();
        foreach ($data as $table) {
            $k = str_replace($this->prefix, '', $table);
            $enum = EnumHelper::get($k);
            $collection = [];
            foreach ($enum as $name => $value) {
                if (!is_null($value)) {
                    if (!is_numeric($name)) {
                        $collection[] = ['name' => $name, 'value' => $value];
                    } else {
                        $collection[] = ['value' => $value];
                    }
                }
            }
            // $res[$table] = $collection;
            SchemaHelper::insertMultiple($table, $collection);
        }
    }

    public function factory(): array
    {
        $data = SchemaHelper::tables($this->prefix);
        return $data;
    }
}
