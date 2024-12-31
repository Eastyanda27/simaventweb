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
        Schema::create('perabotans', function (Blueprint $table) {
            $table->id();
            $table->string('id_asset')->unique();
            $table->foreignId('sub_category')->nullable();
            $table->string('asset_name');
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('specification')->nullable();
            $table->integer('warranty_period')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->string('condition');
            $table->string('description')->nullable();
            $table->foreignId('asset_holder');
            $table->foreignId('user_entry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perabotans');
    }
};
