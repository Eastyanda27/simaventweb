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
        Schema::create('inspeksi_asets', function (Blueprint $table) {
            $table->id();
            $table->string('id_report');
            $table->foreignId('sender');
            $table->foreignId('auditors')->nullable();
            $table->string('month');
            $table->string('year');
            $table->foreignId('id_asset');
            $table->string('conditions');
            $table->string('message')->nullable();
            $table->string('reply_message')->nullable();
            $table->json('attachment')->nullable();
            $table->string('status');
            $table->dateTime('validate_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspeksi_asets');
    }
};
