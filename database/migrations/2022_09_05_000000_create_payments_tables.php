<?php

use App\Helpers\EnumHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->enum('gateway', EnumHelper::of('PAY_ISP'));
            $table->double('charges')->default(0);
            $table->string('contact_name', 50)->nullable();
            $table->string('contact_email', 50)->nullable();
            $table->string('contact_phone', 25)->nullable();
            $table->string('contact_address', 160)->nullable();
            $table->string('api_docs')->nullable();
            $table->longText('test_cards')->nullable();
            $table->longText('test_param')->nullable();
            $table->longText('test_curl')->nullable();
            $table->longText('live_param')->nullable();
            $table->longText('live_curl')->nullable();

            MigrationTrait::shared($table);

        });

        Schema::create('payment_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->double('fee')->default(0);
            $table->double('vat')->default(0);
            $table->unsignedInteger('payment_gateway_id')->nullable()->references('id')->on('payment_gateways')->onDelete('set null');
            $table->unsignedInteger('map_sessions_to_programme_id')->nullable()->references('id')->on('map_sessions_to_programmes')->onDelete('set null');

            MigrationTrait::shared($table);

        });

        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction')->nullable();
            $table->enum('type', EnumHelper::in('TXN_TYPE_MAP'))->default('CR');
            $table->enum('mode', EnumHelper::of('PAY_MODE'));
            $table->double('amount')->default(0);
            $table->string('narration', 255)->nullable();
            $table->string('depositor')->nullable();
            $table->longText('request')->nullable();
            $table->longText('response')->nullable();
            $table->string('response_code', 6)->nullable();

            $table->unsignedInteger('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->unsignedInteger('payment_invoice_id')->nullable()->references('id')->on('payment_invoices')->onDelete('set null');
            $table->unsignedInteger('map_sessions_to_programme_id')->nullable()->references('id')->on('map_sessions_to_programmes')->onDelete('set null');

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
        Schema::dropIfExists('payment_gateways');
        Schema::dropIfExists('payment_invoices');
        Schema::dropIfExists('payment_transactions');
    }
}
