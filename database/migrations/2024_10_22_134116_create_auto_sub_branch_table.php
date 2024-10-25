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
        Schema::create('auto_sub_branch', function (Blueprint $table) {
<<<<<<< HEAD
            $table->string('id');
=======
            $table->string('id')->primary();
>>>>>>> 7cea8549b52a9651a9e4b205ad8f879ffd617199
            $table->string('name');
            $table->string('auto_branch_id');
            $table->string('auto_type');
            $table->string('status');
            $table->text('desc')->nullable();

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
        Schema::dropIfExists('auto_sub_branch');
    }
};
