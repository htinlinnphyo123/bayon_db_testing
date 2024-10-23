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
        Schema::create('branch', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('type')->nullable(); // array
            $table->string('address')->nullable();
            $table->smallInteger('code')->nullable();
            $table->string('logo')->nullable();
            $table->string('country_id')->nullable();
            $table->string('location_id')->nullable();
            $table->string('en_short_name')->nullable();
            $table->string('status')->nullable();
            $table->string('is_renew')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->string('facebook')->nullable();
            $table->string('association_id')->nullable(); //association_id
            $table->string('association_member_code')->nullable();
            $table->string('telegram')->nullable();
            $table->string('certificate')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('certificate_type')->nullable();
            $table->boolean('is_request_to_verify')->nullable();
            $table->dateTime('requested_at')->nullable();
            $table->string('verification_status')->nullable();
            $table->dateTime('approved_at')->nullable();

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
        Schema::dropIfExists('branch');
    }
};
