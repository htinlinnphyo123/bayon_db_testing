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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id');
            $table->string('services')->nullable();
            $table->string('password')->nullable();
            $table->string('resume')->nullable();
            $table->string('username')->nullable();
            $table->string('profile')->nullable();
            $table->string('full_name')->nullable();
            $table->boolean('approved')->nullable();
            $table->boolean('owner')->nullable();
            $table->string('language')->nullable();
            $table->boolean('is_dark')->nullable();
            $table->boolean('dense')->nullable();
            $table->integer('side_color_filter')->nullable();
            $table->integer('img_background')->nullable();
            $table->boolean('is_side_bar_image')->nullable();
            $table->integer('user_login')->nullable();
            $table->integer('max_user_login')->nullable();
            $table->timestamp('work_time_morning_start')->nullable();
            $table->timestamp('work_time_morning_end')->nullable();
            $table->timestamp('work_time_afternoon_start')->nullable();
            $table->timestamp('work_time_afternoon_end')->nullable();
            $table->string('phone_number_prefix')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('work_day_morning')->nullable();
            $table->integer('work_day_afternoon')->nullable();
            $table->boolean('status')->nullable();
            $table->string('roles')->nullable();
            $table->string('module')->nullable();
            $table->string('branch')->nullable();
            $table->string('default_branch')->nullable();
            $table->string('url')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('sms_code')->nullable();
            $table->string('email')->nullable();
            $table->string('login_tokens')->nullable();
            $table->string('user_type')->nullable();
            $table->string('ip_list')->nullable();
            $table->string('agent_id')->nullable();
            $table->string('notification_id')->nullable();
            $table->timestamp('[renew_date')->nullable();
            $table->text('segment_list')->nullable();
            $table->string('agency_id')->nullable();
            $table->integer('follower_count')->nullable();
            $table->string('bio')->nullable();
            $table->date('dob')->nullable();
            $table->string('education')->nullable();
            $table->text('facebook')->nullable();
            $table->string('job_level')->nullable();
            $table->string('location_id')->nullable();
            $table->string('occupation')->nullable();
            $table->string('payment_qr_code')->nullable();
            $table->string('telegram')->nullable();
            $table->string('type')->nullable();
            $table->string('yearly_income')->nullable();


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
        Schema::dropIfExists('users');
    }
};
