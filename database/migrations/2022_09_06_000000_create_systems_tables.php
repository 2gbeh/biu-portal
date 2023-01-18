<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\MigrationTrait;


class CreateSystemsTables extends Migration
{
    private $table;
    public function __construct()
    {
        $this->table = [
            'list_sessions',
            'list_programmes',
            'list_faculties',
            'list_departments',
            'list_units',
            'list_levels',
            'list_exams',
            'list_subjects',
            'list_grades',
        ];
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->table as $table) {
            Schema::create($table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('value')->unique();
            });
        }

        Schema::create('map_sessions_to_programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('list_session_id')->nullable()->references('id')->on('list_sessions')->onDelete('set null');
            $table->unsignedInteger('list_programme_id')->nullable()->references('id')->on('list_programmes')->onDelete('set null');

            MigrationTrait::shared($table);
        });

        Schema::create('map_departments_to_faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('list_department_id')->nullable()->references('id')->on('list_departments')->onDelete('set null');
            $table->unsignedInteger('list_faculty_id')->nullable()->references('id')->on('list_faculties')->onDelete('set null');

            MigrationTrait::shared($table);
        });

        Schema::create('map_units_to_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('list_unit_id')->nullable()->references('id')->on('list_units')->onDelete('set null');
            $table->unsignedInteger('list_department_id')->nullable()->references('id')->on('list_departments')->onDelete('set null');

            MigrationTrait::shared($table);
        });

        Schema::create('map_units_to_programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('degree', 25);
            $table->unsignedInteger('list_unit_id')->nullable()->references('id')->on('list_units')->onDelete('set null');
            $table->unsignedInteger('list_programme_id')->nullable()->references('id')->on('list_programmes')->onDelete('set null');

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
        foreach ($this->table as $table) {
            Schema::dropIfExists($table);
        }

        Schema::dropIfExists('map_sessions_to_programmes');
        Schema::dropIfExists('map_departments_to_faculties');
        Schema::dropIfExists('map_units_to_departments');
        Schema::dropIfExists('map_units_to_programmes');
    }
}
