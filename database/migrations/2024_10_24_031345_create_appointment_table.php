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
        Schema::create('appointment', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('other_id')->nullable();
            $table->string('user_id')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('name')->nullable();
            $table->string('color')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->boolean('timed')->nullable();
            $table->string('branch_id')->nullable();
            $table->text('details')->nullable();

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
        Schema::dropIfExists('appointment');
    }
};
