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
        Schema::create('depresiasi_asets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_asset');
            $table->string('method');
            $table->integer('price');
            $table->integer('residual_price');
            $table->integer('economic_life');
            $table->integer('depreciation_yearly')->nullable();
            $table->integer('depreciation_monthly')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depresiasi_asets');
    }
};
