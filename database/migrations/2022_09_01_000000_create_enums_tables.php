<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnumsTables extends Migration
{
    private $table;

    public function __construct()
    {
        $this->table = [
            // 'enum_action',
            'enum_banks_ng',
            'enum_card_type',
            'enum_country',
            'enum_degree',
            // 'enum_entity',
            'enum_file',
            'enum_marital_status',
            'enum_pay_mode',
            'enum_pay_isp',
            'enum_religion',
            // 'enum_role',
            'enum_states_ng',
            'enum_status',
            'enum_title',
            'enum_txn_status',
            'enum_txn_type_map',
        ];
    }

    public function up()
    {
        // return 1;
        foreach ($this->table as $table) {
            Schema::create($table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('value')->unique();
            });
        }
    }

    public function down()
    {
        foreach ($this->table as $table) {
            Schema::dropIfExists($table);
        }
    }
}
