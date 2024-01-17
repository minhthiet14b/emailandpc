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
        Schema::table('pc_names', function (Blueprint $table) {
            $table->string('model')->nullable()->change();
            $table->string('processor')->nullable()->change();
            $table->string('total_HDD')->nullable()->change();
            $table->string('operating_system')->nullable()->change();
            $table->string('ram')->nullable()->change();
            $table->string('hark_disk')->nullable()->change();
            $table->string('motherboard_summary')->nullable()->change();
            $table->string('description')->nullable()->change();
            $table->string('current_user')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('monitors_summary')->nullable()->change();
            $table->string('screen_size')->nullable()->change();
            $table->string('year_used')->nullable()->change();
            $table->string('location')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pc_names', function (Blueprint $table) {
            $table->string('model')->nullable()->change();
            $table->string('processor')->nullable()->change();
            $table->string('total_HDD')->nullable()->change();
            $table->string('operating_system')->nullable()->change();
            $table->string('ram')->nullable()->change();
            $table->string('hark_disk')->nullable()->change();
            $table->string('motherboard_summary')->nullable()->change();
            $table->string('description')->nullable()->change();
            $table->string('current_user')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('monitors_summary')->nullable()->change();
            $table->string('screen_size')->nullable()->change();
            $table->string('year_used')->nullable()->change();
            $table->string('location')->nullable()->change();
        });
    }
};
