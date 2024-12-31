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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('id_asset')->unique();
            $table->foreignId('sub_category')->nullable();
            $table->string('asset_name');
            $table->string('number_plate')->nullable();
            $table->string('brand');
            $table->string('type');
            $table->integer('cc_size')->nullable();
            $table->string('frame_number')->nullable();
            $table->string('machine_number')->nullable();
            $table->string('bpkb_number')->nullable();
            $table->string('color');
            $table->string('production_year');
            $table->integer('price');
            $table->string('description')->nullable();
            $table->foreignId('asset_holder');
            $table->foreignId('user_entry');
            $table->foreignId('id_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
