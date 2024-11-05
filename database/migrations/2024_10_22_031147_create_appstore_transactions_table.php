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
        Schema::create('appstore_transactions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('tran_id')->nullable();
            $table->string('app_store_tran_id')->nullable();
            $table->string('product_id')->nullable();
            $table->double('price')->nullable();
            $table->boolean('status')->nullable();

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
        Schema::dropIfExists('appstore_transactions');
    }
};
