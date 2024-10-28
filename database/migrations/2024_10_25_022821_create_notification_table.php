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
        Schema::create('notification', function (Blueprint $table) {
            $table->string('id');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('country_code',20)->nullable();
            $table->string('video_link')->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->string('external_link')->nullable();

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
        Schema::dropIfExists('notification');
    }
};
