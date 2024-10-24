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
        Schema::create('apply_loan', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('note')->nullable();
            $table->integer('price')->nullable();
            $table->unsignedSmallInteger('participate_percent')->nullable();
            $table->unsignedMediumInteger('term')->nullable();
            $table->string('property_id')->nullable();
            $table->string('address')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('purpose_id')->nullable();
            $table->string('location_id');
            $table->string('district_id')->nullable();
            $table->string('nrc_no')->nullable();
            $table->string('currency_code',20)->nullable();
            $table->string('country_id',20)->nullable();
            $table->string('currency_symbol',20)->nullable();
            $table->string('home_no')->nullable();
            $table->string('street_no')->nullable();
            $table->string('occupation')->nullable();
            $table->double('currency_salary_or_monthly_income')->nullable();
            $table->string('company_or_business_name')->nullable();
            $table->string('comp_or_bus_street_no')->nullable();
            $table->string('comp_or_bus_country_id')->nullable();
            $table->string('comp_or_bus_home_no')->nullable();
            $table->string('comp_or_bus_location_id')->nullable();
            $table->string('comp_or_bus_district_id')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nrc_photo')->nullable();
            $table->string('selfie_photo')->nullable();
            $table->string('business_type')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_loan');
    }
};
