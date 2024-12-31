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
        Schema::create('keuangan_asets', function (Blueprint $table) {
            $table->id();
            $table->string('id_finance');
            $table->foreignId('id_asset');
            $table->string('category');
            $table->date('date');
            $table->integer('nominal');
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
        Schema::dropIfExists('keuangan_asets');
    }
};
