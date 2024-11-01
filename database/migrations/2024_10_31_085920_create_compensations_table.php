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
        Schema::create('compensations', function (Blueprint $table) {
            $table->string('id');
            $table->string('name')->nullable();
            $table->boolean('status')->nullable();
            $table->string('type')->nullable();
            $table->string('max_commission_level')->nullable();
            $table->string('level_list')->nullable();
            $table->integer('direct')->nullable();
            $table->integer('up_line')->nullable();
            $table->integer('sponsor')->nullable();
            $table->string('config_id')->nullable();

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
        Schema::dropIfExists('compensations');
    }
};
