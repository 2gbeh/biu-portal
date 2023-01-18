<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privilege_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('policy');
            $table->string('route', 64)->nullable();
            $table->string('icon', 64)->nullable();
            $table->string('badge', 64)->nullable();

            MigrationTrait::shared($table);
        });

        Schema::create('privilege_gates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('privilege_policy_id')->nullable()->references('id')->on('privilege_policies')->onDelete('set null');
            $table->string('gate');
            $table->string('route', 64)->nullable();
            $table->string('icon', 64)->nullable();
            $table->string('badge', 64)->nullable();

            MigrationTrait::shared($table);
        });

        Schema::create('privilege_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role')->unique();

            MigrationTrait::shared($table);
        });

        Schema::create('privilege_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('privilege_role_id')->index()->references('id')->on('privilege_roles')->onDelete('cascade');
            $table->unsignedInteger('privilege_gate_id')->references('id')->on('privilege_gates')->onDelete('cascade');

            MigrationTrait::shared($table);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privilege_policies');
        Schema::dropIfExists('privilege_gates');
        Schema::dropIfExists('privilege_roles');
        Schema::dropIfExists('privilege_permissions');
    }
}
