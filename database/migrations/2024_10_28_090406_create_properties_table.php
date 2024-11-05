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
        Schema::create('properties', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->text('title');
            $table->string('location_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('phone_number_prefix')->nullable();
            $table->string('group_type')->nullable();
            $table->text('address')->nullable();
            $table->text('desc')->nullable();
            $table->string('dimension')->nullable();
            $table->text('url_list')->nullable();
            $table->string('property_status')->nullable();
            $table->double('price_per_square')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->integer('depth')->nullable();
            $table->double('width')->nullable();
            $table->string('type')->nullable();
            $table->string('position')->nullable();
            $table->integer('num_bathroom')->nullable();
            $table->integer('num_bed')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->integer('view')->nullable();
            $table->integer('num_renew')->nullable();
            $table->integer('num_fav')->nullable();
            $table->string('status')->nullable();
            $table->string('share_url')->nullable();
            $table->string('price_short')->nullable();
            $table->string('district_id')->nullable();
            $table->string('title_type')->nullable();
            $table->string('geolocation')->nullable();
            $table->integer('commission_fee')->nullable();
            $table->boolean('is_marker')->nullable();
            $table->text('near_by')->nullable();
            $table->string('fb_post_id')->nullable();
            $table->text('link_youtube')->nullable();
            $table->text('additional')->nullable();
            $table->timestamp('first_created_at')->nullable();
            $table->integer('last_price')->nullable();
            $table->string('project_id')->nullable();
            $table->integer('actual_price')->nullable();
            $table->integer('deposit_price')->nullable();
            $table->string('client_id')->nullable();
            $table->string('branch_id')->nullable();

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
        Schema::dropIfExists('properties');
    }
};
