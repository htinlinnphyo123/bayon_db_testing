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
        Schema::create('measuring_area', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->double('area')->nullable();
            $table->text('lat_lng')->nullable();
            $table->string('initial_camera_position')->nullable();
            $table->decimal('zoom_level',15,13)->nullable();
            $table->string('static_map_url')->nullable();
            $table->string('user_id')->nullable();

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
        Schema::dropIfExists('measuring_area');
    }
};
