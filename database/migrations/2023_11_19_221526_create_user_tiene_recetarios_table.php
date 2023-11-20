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
        Schema::create('user_tiene_recetarios', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->unsignedTinyInteger('recetario_id');
            $table->foreign('recetario_id')->references('id')->on('recetarios');
            $table->primary(['user_id', 'recetario_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tiene_recetarios');
    }
};
