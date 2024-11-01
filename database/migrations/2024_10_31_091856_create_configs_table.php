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
        Schema::create('configs', function (Blueprint $table) {
            $table->string('id');
            $table->integer('paid_commission_if_over')->nullable();
            $table->string('type_paid_commission')->nullable();
            $table->integer('monthly_withdraw')->nullable();
            $table->string('type_monthly_withdraw')->nullable();
            $table->date('withdraw_date')->nullable();
            $table->string('prefix')->nullable();

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
        Schema::dropIfExists('configs');
    }
};
