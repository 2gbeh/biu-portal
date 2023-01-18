<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique()->references('id')->on('users')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->string('title', 5)->nullable();
            $table->string('pronoun', 5)->nullable();
            $table->string('surname', 25)->index();
            $table->string('first_name', 25);
            $table->string('middle_name', 25)->nullable();
            $table->string('nickname', 25)->nullable();
            $table->enum('sex', ['N/A', 'M', 'F', 'N_B'])->default('N/A');
            $table->date('dob')->nullable();
            $table->double('bmi', 3, 1)->nullable();
            $table->tinyInteger('age')->nullable();
            $table->string('age_group', 50)->nullable();
            $table->string('race', 50)->nullable();
            $table->string('nationality')->nullable();
            $table->string('state_of_origin', 50)->nullable();
            $table->string('lga_of_origin', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('marital_status', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('email_alt', 50)->nullable();
            $table->string('phone_no', 25)->nullable();
            $table->string('mobile_no', 25)->nullable();
            $table->string('fax_no', 25)->nullable();
            $table->string('address', 160)->nullable();
            $table->string('country')->nullable();
            $table->string('region', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zip_code', 25)->nullable();
            $table->string('postal_code', 25)->nullable();
            $table->string('qualification', 50)->nullable();
            $table->string('occupation', 50)->nullable();
            $table->string('company', 50)->nullable();
            $table->string('website')->nullable();

            MigrationTrait::shared($table);

        });

        Schema::create('user_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index()->references('id')->on('users')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->string('contact', 50)->default('CONTACT');
            $table->string('names', 50);
            $table->enum('sex', ['N/A', 'M', 'F', 'N_B'])->default('N/A');
            $table->string('rel', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone_no', 25);
            $table->string('address', 160)->nullable();
            $table->string('company', 50)->nullable();

            MigrationTrait::shared($table);

        });

        Schema::create('user_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index()->references('id')->on('users')->onDelete('cascade');
            $table->string('file')->default('PASSPORT');
            $table->string('path')->nullable();
            $table->binary('blob')->nullable();
            $table->integer('size')->nullable();

            MigrationTrait::shared($table);

        });

        Schema::create('user_links', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index()->references('id')->on('users')->onDelete('cascade');
            $table->string('link', 50)->default('WEBSITE');
            $table->string('url');

            MigrationTrait::shared($table);

        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index()->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('privilege_role_id')->references('id')->on('privilege_roles')->onDelete('cascade');

            MigrationTrait::shared($table);

        });

        Schema::create('user_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('action', ['INSERT', 'SELECT', 'UPDATE', 'DELETE', 'SIGN_UP', 'SIGN_IN', 'SIGN_OUT'])->default('SELECT');
            $table->ipAddress('ip');
            $table->enum('request', ['POST', 'GET', 'PATCH', 'PUT', 'DELETE', 'HEAD', 'OPTION'])->default('GET');
            $table->string('route', 255);
            $table->string('method', 255)->nullable();

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
        Schema::dropIfExists('user_profiles');
        Schema::dropIfExists('user_contacts');
        Schema::dropIfExists('user_files');
        Schema::dropIfExists('user_links');
        Schema::dropIfExists('user_logs');
        Schema::dropIfExists('user_roles');
    }
}
