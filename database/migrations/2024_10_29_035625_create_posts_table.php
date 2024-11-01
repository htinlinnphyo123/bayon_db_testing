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
        Schema::create('posts', function (Blueprint $table) {
            $table->string('id');
            $table->string('type')->nullable();
            $table->string('country_id')->nullable();
            $table->text('description')->nullable();
            $table->text('photos')->nullable();
            $table->integer('like_count')->nullable();
            $table->integer('comment_count')->nullable();
            $table->integer('share_count')->nullable();
            $table->integer('view_count')->nullable();
            $table->text('videos')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('is_objective')->nullable();
            $table->string('objective_type')->nullable();
            $table->string('link')->nullable();
            $table->string('price')->nullable();


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
        Schema::dropIfExists('posts');
    }
};
