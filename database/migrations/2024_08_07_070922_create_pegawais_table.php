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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('email');
            $table->string('employee_name');
            $table->string('nip');
            $table->string('place_birth')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('group')->nullable();
            $table->string('rank')->nullable();
            $table->string('gender')->nullable();
            $table->string('last_education')->nullable();
            $table->string('agency')->nullable();
            $table->string('work_unit')->nullable();
            $table->string('position')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
