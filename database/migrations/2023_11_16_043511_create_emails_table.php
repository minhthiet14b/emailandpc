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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('pc_name');
            $table->string('name');
            $table->string('chinese_name');
            $table->integer('dep_id');
            $table->string('email');
            $table->string('ip');
            $table->integer('role')->nullable();
            $table->string('skype')->nullable();
            $table->string('zalo')->nullable();
            $table->string('webchat')->nullable();
            $table->string('line')->nullable();
            $table->boolean('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
