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
        Schema::create('agent', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('name');
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('country_id')->nullable();
            $table->string('location_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('start_date')->nullable();
            $table->date('dob')->nullable();
            $table->boolean('status')->nullable();
            $table->string('agent_type')->nullable();
            $table->string('type')->nullable();
            $table->integer('member_code')->nullable();
            $table->string('up_line_list_id')->nullable();
            $table->string('phone')->nullable();
            $table->integer('total_property')->nullable();
            $table->text('photo')->nullable();
            $table->boolean('is_renew')->nullable();
            $table->text('description')->nullable();
            $table->text('facebook')->nullable();
            $table->string('telegram')->nullable();
            $table->string('user_id')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('total_auto')->nullable();
            $table->boolean('is_formal')->nullable();
            $table->string('license')->nullable();
            $table->string('association_id')->nullable();
            $table->string('association_member_code')->nullable();
            $table->string('certificate')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('certificate_type')->nullable();
            $table->boolean('is_request_to_verify')->nullable();
            $table->dateTime('requested_at')->nullable();
            $table->string('verification_status')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->integer('view')->nullable();
            $table->integer('heart')->nullable();
            $table->string('hearted_users')->nullable();

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
        Schema::dropIfExists('agent');
    }
};
