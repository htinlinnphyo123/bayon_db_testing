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
        Schema::create('announcement', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('body');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('start_month_day',5);
            $table->string('end_month_day',5);
            $table->string('country_code');

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
        Schema::dropIfExists('announcement');
    }
};
