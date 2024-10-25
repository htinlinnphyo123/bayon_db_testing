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
        Schema::create('client', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('opening_balance')->nullable();
            $table->longText('note')->nullable();
            $table->date('dob')->nullable();
            $table->string('type')->nullable();
            $table->string('client_type')->nullable();
            $table->integer('loan_cycle')->nullable();
            $table->integer('order')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('phone_number_prefix')->nullable();
            $table->string('location_id')->nullable();
            $table->string('district_id')->nullable();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};
