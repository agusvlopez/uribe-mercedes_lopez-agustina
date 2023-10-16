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
        Schema::table('entradas_blog', function (Blueprint $table) {

            $table->unsignedTinyInteger('clasification_id')->after('blog_id');

            //Definimos la FK
            $table->foreign('clasification_id')->references('clasification_id')->on('clasifications');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entradas_blog', function (Blueprint $table) {
            $table->dropColumn('clasification_id');
        });
    }
};
