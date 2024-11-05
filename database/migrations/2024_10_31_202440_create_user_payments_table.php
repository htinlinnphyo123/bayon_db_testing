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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->nullable();
            $table->integer('amount')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('req_time')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('agent_doc')->nullable();
            $table->string('agency_doc')->nullable();
            $table->string('developer_doc')->nullable();
            $table->string('platform')->nullable();
            $table->string('property_id')->nullable();
            $table->text('external_property_doc')->nullable();
            $table->string('product_id')->nullable();
            $table->string('upgrade_to')->nullable();
            $table->string('valuator')->nullable();


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
        Schema::dropIfExists('user_payments');
    }
};
