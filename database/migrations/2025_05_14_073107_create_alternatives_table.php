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
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->string('alternative_code')->unique();
            $table->string('alternative_name');
            $table->enum('gender', ['L', 'P']);
            $table->string('nik')->unique();
            $table->string('job');
            $table->string('family_members');
            $table->string('address');
            $table->double('total_blt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatives');
    }
};
