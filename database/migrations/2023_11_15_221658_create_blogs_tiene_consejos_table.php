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
        Schema::create('blogs_tiene_consejos', function (Blueprint $table) {
            $table->foreignId('blog_id')->constrained('entradas_blog', 'blog_id');
            $table->unsignedTinyInteger('consejo_id');
            $table->foreign('consejo_id')->references('consejo_id')->on('consejos');
            $table->primary(['blog_id', 'consejo_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs_tiene_consejos');
    }
};
