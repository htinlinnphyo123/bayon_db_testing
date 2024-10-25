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
        Schema::create('property_type', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('native_name')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->boolean('status')->nullable();
            $table->string('language')->nullable();

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
        Schema::dropIfExists('property_type');
    }
};
