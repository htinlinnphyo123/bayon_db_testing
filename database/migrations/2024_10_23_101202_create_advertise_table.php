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
        Schema::create('advertise', function (Blueprint $table) {
            $table->string('id');
            $table->date('start_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->string('country_code')->nullable();
            $table->string('property_id')->nullable();
            $table->integer('count')->nullable();
            $table->string('agent_id')->nullable();
            $table->string('agency_id')->nullable();

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
        Schema::dropIfExists('advertise');
    }
};
