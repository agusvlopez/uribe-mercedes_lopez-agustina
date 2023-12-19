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
        Schema::create('compras', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('recetario_id')->constrained('recetarios', 'id');
            $table->string('recetario_title')->constrained('recetarios', 'title');
            $table->unsignedInteger('recetario_price')->constrained('recetarios', 'price');
            $table->primary(['user_id', 'recetario_id']);
            $table->unsignedInteger('cantidad')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
