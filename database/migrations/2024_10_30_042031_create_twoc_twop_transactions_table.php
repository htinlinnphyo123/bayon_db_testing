<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('twoc_twop_transactions', function (Blueprint $table) {
            $table->string('id');
            $table->string('card_no')->nullable();
            $table->string('merchant_i_d')->nullable();
            $table->string('invoice_no')->nullable();
            $table->integer('amount')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('reference_no')->nullable();
            $table->double('transaction_date_time')->nullable();
            $table->string('agent_code')->nullable();
            $table->string('channel_code')->nullable();
            $table->integer('resp_code')->nullable();
            $table->string('resp_desc')->nullable();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('twoc_twop_transactions');
    }
};
