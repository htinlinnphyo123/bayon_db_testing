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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->string('id');
            $table->integer('user_id')->nullable();
            $table->integer('plan_id')->nullable();
            $table->string('plan_name')->nullable();
            $table->string('agent')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('num_renew')->nullable();
            $table->integer('num_property')->nullable();
            $table->integer('num_measurement')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('num_document')->nullable();
            $table->integer('num_auto')->nullable();
            $table->double('num_social_post')->nullable();
            $table->integer('add_on_renew')->nullable();
            $table->integer('num_renew_use')->nullable();
            $table->integer('add_on_measurement')->nullable();
            $table->integer('num_measurement_use')->nullable();
            $table->integer('add_on_property')->nullable();
            $table->integer('num_property_use')->nullable();
            $table->integer('num_auto_use')->nullable();
            $table->integer('add_on_auto')->nullable();
            $table->integer('num_document_use')->nullable();
            $table->integer('num_document_use_daily')->nullable();
            $table->double('reach_doc_use_daily_limit')->nullable();
            $table->integer('num_social_post_use_daily')->nullable();
            $table->boolean('reach_social_post_use_daily_limit')->nullable();
            $table->boolean('status')->nullable();

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
        Schema::dropIfExists('user_subscriptions');
    }
};
