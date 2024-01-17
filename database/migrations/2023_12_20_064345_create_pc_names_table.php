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
        Schema::create('pc_names', function (Blueprint $table) {
            $table->id();
            $table->string('network_name');
            $table->string('ip_address');
            $table->string('model');
            $table->string('processor');
            $table->string('total_HDD');
            $table->string('operating_system');
            $table->string('ram');
            $table->string('hark_disk');
            $table->string('motherboard_summary');
            $table->string('description');
            $table->string('current_user');
            $table->string('status');
            $table->string('monitors_summary');
            $table->string('screen_size');
            $table->string('year_used');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pc_names');
    }
};
