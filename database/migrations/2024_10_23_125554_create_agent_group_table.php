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
            $table->string('id')->primary();
            $table->string('group_number')->nullable();
            $table->string('name');
            $table->string('country_id');
            $table->string('location_id')->nullable();
            $table->boolean('is_share_group')->nullable();
            $table->boolean('status');
            
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('agent_group_commission',function(Blueprint $table){
            $table->id();
            $table->string('property_type')->nullable();
            $table->float('total_commission_fee')->default(0);
            $table->float('succeed_commission_fee')->default(0);
            $table->float('share_commission_fee')->default(0);
            $table->string('agent_group_id');
            
            $table->foreign('agent_group_id')->references('id')->on('agent_group');
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
