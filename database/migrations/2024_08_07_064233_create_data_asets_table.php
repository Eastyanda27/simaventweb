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
        Schema::create('data_asets', function (Blueprint $table) {
            $table->id();
            $table->string('id_asset')->unique();
            $table->string('asset_name');
            $table->string('asset_category');
            $table->foreignId('sub_category')->nullable();
            $table->foreignId('asset_holder')->nullable();
            $table->foreignId('user_entry');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_asets');
    }
};
