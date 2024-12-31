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
        Schema::create('jurnal_asets', function (Blueprint $table) {
            $table->id();
            $table->string('id_journal');
            $table->foreignId('id_asset');
            $table->date('date');
            $table->string('incident');
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
        Schema::dropIfExists('jurnal_asets');
    }
};
