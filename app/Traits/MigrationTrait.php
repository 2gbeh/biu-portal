<?php
declare (strict_types = 1);

namespace App\Traits;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

trait MigrationTrait
{

    //  SHARED TABLE FIELDS
    public static function shared(Blueprint $table)
    {
        $table->string('notes', 255)->nullable();
        $table->tinyInteger('status')->default(0);
        $table->timestamps();
        $table->softDeletes();
        $table->unsignedInteger('created_by')->nullable();
        $table->unsignedInteger('updated_by')->nullable();
        $table->unsignedInteger('deleted_by')->nullable();
    }

    public static function systems(Blueprint $table)
    {
        $table->unsignedInteger('list_session_id')->nullable()->references('id')->on('list_sessions')->onDelete('set null');
        $table->unsignedInteger('list_programme_id')->nullable()->references('id')->on('list_programmes')->onDelete('set null');
        $table->unsignedInteger('list_faculty_id')->nullable()->references('id')->on('list_faculties')->onDelete('set null');
        $table->unsignedInteger('list_department_id')->nullable()->references('id')->on('list_departments')->onDelete('set null');
        $table->unsignedInteger('list_unit_id')->nullable()->references('id')->on('list_units')->onDelete('set null');
        $table->unsignedInteger('list_level_id')->nullable()->references('id')->on('list_levels')->onDelete('set null');
    }

}
