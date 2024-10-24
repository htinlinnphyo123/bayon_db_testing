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
        Schema::create('company', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('latin_name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('base_currency')->nullable();
            $table->boolean('is_paid')->nullable();
            $table->string('url_payment')->nullable();
            $table->boolean('is_run_daily')->nullable();
            
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
        Schema::dropIfExists('company');
    }
};
