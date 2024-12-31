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
        Schema::create('tanah_bangunans', function (Blueprint $table) {
            $table->id();
            $table->string('id_asset')->unique();
            $table->foreignId('sub_category')->nullable();
            $table->string('asset_name');
            $table->integer('size');
            $table->string('rights_status');
            $table->string('address');
            $table->string('condition')->nullable();
            $table->date('certificate_date');
            $table->string('certificate_number');
            $table->string('origin');
            $table->integer('price');
            $table->integer('useful_life')->nullable();
            $table->string('use_for')->nullable();
            $table->string('description')->nullable();
            $table->string('subdistrict');
            $table->string('village');
            $table->foreignId('user_entry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanah_bangunans');
    }
};
