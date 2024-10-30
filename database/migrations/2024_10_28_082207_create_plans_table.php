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

        Schema::create('plans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedMediumInteger('order');
            $table->boolean('status');
            $table->string('advertise_note')->nullable();
            
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });

        Schema::create('plan_details', function (Blueprint $table) {
            $table->id();

            $table->string('country_code',20)->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->unsignedSmallInteger('num_property')->nullable();
            $table->unsignedSmallInteger('num_renew')->nullable();
            $table->unsignedSmallInteger('num_agent')->nullable();
            $table->unsignedSmallInteger('num_measurement')->nullable();
            $table->float('price_per_measurement',2)->nullable();
            $table->unsignedInteger('num_document')->nullable();
            $table->unsignedInteger('price_per_advertise')->nullable();
            $table->unsignedInteger('price_per_valuation')->nullable();
            $table->unsignedInteger('price_per_post')->nullable();
            $table->unsignedInteger('price_per_renew')->nullable();
            $table->unsignedInteger('num_social_post')->nullable();
            $table->unsignedInteger('num_auto')->nullable();
            $table->unsignedInteger('num_file_social_post')->nullable();
            $table->string('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
        Schema::dropIfExists('plan_details');
    }
};
