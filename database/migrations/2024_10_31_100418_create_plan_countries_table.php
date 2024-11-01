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
        Schema::create('plan_countries', function (Blueprint $table) {
            $table->string('id');
            $table->string('country_code')->nullable();
            $table->integer('price')->nullable();
            $table->integer('num_property')->nullable();
            $table->integer('num_renew')->nullable();
            $table->integer('num_agent')->nullable();
            $table->integer('num_measurement')->nullable();
            $table->double('price_per_measurement')->nullable();
            $table->integer('num_document')->nullable();
            $table->integer('price_per_advertise')->nullable();
            $table->integer('price_per_valuation')->nullable();
            $table->integer('price_per_post')->nullable();
            $table->integer('price_per_renew')->nullable();
            $table->integer('num_social_post')->nullable();
            $table->integer('num_auto')->nullable();
            $table->integer('num_file_social_post')->nullable();

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
        Schema::dropIfExists('plan_countries');
    }
};
