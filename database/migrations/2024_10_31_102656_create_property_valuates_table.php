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
        Schema::create('property_valuates', function (Blueprint $table) {
            $table->string('id');
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('valuator')->nullable();
            $table->string('valuation_status')->nullable();
            $table->string('payment_id')->nullable();
            $table->boolean('is_external_property')->nullable();
            $table->string('property_id')->nullable();
            $table->string('certificate')->nullable();
            $table->text('external_property_doc')->nullable();

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
        Schema::dropIfExists('property_valuates');
    }
};
