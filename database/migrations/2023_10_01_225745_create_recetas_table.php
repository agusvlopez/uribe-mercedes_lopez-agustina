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
        Schema::create('recetarios', function (Blueprint $table) {

            //id   PK UNSIGNED BIGINT AUTO_INCREMENT
            //nombre     VARCHAR
            //ingredientes   TEXT
            //preparación    TEXT
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recetarios');
    }
};
