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
        Schema::create('user_actions', function (Blueprint $table) {
            $table->string('id');
            $table->string('user_id')->nullable();
            $table->string('property_id')->nullable();
            $table->string('receiver')->nullable();
            $table->boolean('is_property')->nullable();
            $table->string('wanted_id')->nullable();
            $table->string('search_keyword')->nullable();
            $table->string('search_doc')->nullable();
            $table->string('type')->nullable();
            $table->string('auto_id')->nullable();
            $table->string('action')->nullable();

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
        Schema::dropIfExists('user_actions');
    }
};
