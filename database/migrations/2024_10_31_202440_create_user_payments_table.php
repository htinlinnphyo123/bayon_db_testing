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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->nullable();
            $table->integer('amount')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('req_time')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            // $table->string('agent_doc')->nullable();
            $table->string('agency_doc')->nullable();
            $table->string('developer_doc')->nullable();

            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });

        Schema::create('agent_documents', function(Blueprint $table){
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('country_id')->nullable();
            $table->string('location_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('start_date')->nullable();
            $table->date('dob')->nullable();
            $table->boolean('status')->nullable();
            $table->string('description')->nullable();
            $table->string('agent_type')->nullable();
            $table->string('nation_id')->nullable();
            $table->string('type')->nullable();
            $table->string('salary')->nullable();
            $table->string('upLine_id')->nullable();
            $table->string('sponsor_id')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('telegram')->nullable();
            $table->string('user_payment_id');
            $table->foreign('user_payment_id')->references('id')->on('user_payments');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payments');
    }
};
