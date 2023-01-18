<?php

use App\Traits\MigrationTrait;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->string('staff_email', 50)->nullable();
            $table->string('staff_id', 15)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            MigrationTrait::systems($table);
            MigrationTrait::shared($table);
        });

        Schema::create('entity_students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->string('student_email', 50)->nullable();
            $table->string('student_id', 15)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->unsignedBigInteger('entity_applicant_id')->nullable()->references('id')->on('entity_applicants')->onDelete('set null');
            $table->string('matric_no', 15)->nullable();
            $table->string('start_session', 15)->nullable();
            $table->string('end_session', 15)->nullable();

            MigrationTrait::systems($table);
            MigrationTrait::shared($table);
        });

        Schema::create('entity_applicants', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->year('jamb_year')->nullable();
            $table->string('jamb_regno', 15)->nullable();
            $table->integer('jamb_score')->nullable();

            $table->unsignedInteger('map_sessions_to_programme_id')->nullable()->references('id')->on('map_sessions_to_programmes')->onDelete('set null');
            $table->unsignedInteger('map_units_to_programme_id')->nullable()->references('id')->on('map_units_to_programmes')->onDelete('set null');

            MigrationTrait::shared($table);
        });

        Schema::create('entity_applicant_exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_applicant_id')->nullable()->references('id')->on('entity_applicants')->onDelete('set null');
            $table->unsignedBigInteger('list_exam_id')->nullable()->references('id')->on('list_exams')->onDelete('set null');
            $table->string('exam_no', 25);
            $table->string('exam_center')->nullable();
            $table->string('exam_month', 3);
            $table->year('exam_year');
            $table->unsignedBigInteger('list_subject_id')->nullable()->references('id')->on('list_subjects')->onDelete('set null');
            $table->unsignedBigInteger('list_grade_id')->nullable()->references('id')->on('list_grades')->onDelete('set null');

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
        Schema::dropIfExists('entity_staff');
        Schema::dropIfExists('entity_students');
        Schema::dropIfExists('entity_applicants');
        Schema::dropIfExists('entity_applicant_exams');
    }
}
