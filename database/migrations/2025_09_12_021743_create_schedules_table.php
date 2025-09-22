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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('type', ['desa', 'kelurahan']);
            $table->string('meet_link');
            $table->string('top_village_1')->nullable();
            $table->time('time_1')->nullable();
            $table->string('top_village_2')->nullable();
            $table->time('time_2')->nullable();
            $table->string('top_village_3')->nullable();
            $table->time('time_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
