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
        Schema::create('agent_group', function (Blueprint $table) {
            $table->string('id');
            $table->string('group_number')->nullable();
            $table->string('name');
            $table->string('country_id');
            $table->string('location_id');
            $table->string('commission');
            $table->boolean('is_share_group');
            $table->boolean('status');
            
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
        Schema::dropIfExists('agent_group');
    }
};
