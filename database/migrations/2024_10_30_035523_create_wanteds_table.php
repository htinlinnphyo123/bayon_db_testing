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
        Schema::create('wanteds', function (Blueprint $table) {
            $table->string('id');
            $table->string('contact_number')->nullable();
            $table->text('description')->nullable();
            $table->string('country_id')->nullable();
            $table->string('type')->nullable();
            $table->string('group_type')->nullable();
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            $table->boolean('status')->nullable();
            $table->string('district_id')->nullable();
            $table->string('location_id')->nullable();

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
        Schema::dropIfExists('wanteds');
    }
};
