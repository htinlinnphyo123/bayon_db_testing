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
        Schema::create('auto', function (Blueprint $table) {
            $table->string('id');
            $table->string('group_type')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('phone_number_prefix')->nullable();
            $table->string('country_code')->nullable();
            $table->string('location_id')->nullable();
            $table->string("auto_type")->nullable();
            $table->string("auto_branch")->nullable();
            $table->string("auto_sub_branch")->nullable();
            $table->string('auto_condition')->nullable();
            $table->string("transmission_type")->nullable();
            $table->year('year')->nullable();
            $table->integer('price')->nullable();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->text('address')->nullable();
            $table->string('position')->nullable();
            $table->text('url_list')->nullable();
            $table->string('code')->nullable();
            $table->text('geolocation')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->string('price_short')->nullable();
            $table->integer('view')->nullable();
            $table->integer('num_renew')->nullable();
            $table->integer('num_fav')->nullable();
            $table->string('status')->nullable();
            $table->string('share_url')->nullable();
            $table->string('body_type')->nullable();
            $table->string('district_id')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('tax_type')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('color')->nullable();

            $table->dateTime('first_created_at');
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
        Schema::dropIfExists('auto');
    }
};
