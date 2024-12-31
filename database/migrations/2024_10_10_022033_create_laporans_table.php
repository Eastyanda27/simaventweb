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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('id_report')->unique();
            $table->foreignId('sender');
            $table->foreignId('auditors')->nullable();
            $table->string('report_month');
            $table->string('report_year');
            $table->integer('total_asset');
            $table->integer('total_value')->nullable();
            $table->integer('assets_in_good_condition')->nullable();
            $table->integer('assets_in_bad_condition')->nullable();
            $table->integer('total_vehicle');
            $table->integer('total_building');
            $table->integer('total_electronic');
            $table->integer('total_furniture');
            $table->string('notes')->nullable();
            $table->string('reply_notes')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
