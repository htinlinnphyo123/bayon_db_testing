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
        Schema::create('home', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('category')->nullable();
            $table->string('body')->nullable();
            $table->string('size_photo')->nullable();
            $table->string('country_code',20)->nullable();
            $table->string('url')->nullable();
            $table->string('external_link')->nullable();
            $table->string('button_name')->nullable();
            $table->string('video_link')->nullable();

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
        Schema::dropIfExists('home');
    }
};
