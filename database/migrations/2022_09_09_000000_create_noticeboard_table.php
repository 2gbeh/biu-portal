<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\MigrationTrait;

class CreateNoticeboardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticeboard', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->string('subject', 160)->nullable();
            $table->longText('message')->nullable();
            $table->longText('recipients')->nullable();
            $table->longText('links')->nullable();
            $table->longText('images')->nullable();
            $table->longText('attachments')->nullable();

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
        Schema::dropIfExists('noticeboard');
    }
}
