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
        Schema::create('agenda_asets', function (Blueprint $table) {
            $table->id();
            $table->string('id_agenda');
            $table->foreignId('id_asset');
            $table->string('type');
            $table->string('day')->nullable();
            $table->string('date')->nullable();
            $table->date('custom_date')->nullable();
            $table->string('activity');
            $table->string('description')->nullable();
            $table->foreignId('user_entry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_asets');
    }
};
