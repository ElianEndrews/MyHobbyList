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
        Schema::create('animes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('colecao_id')->unsigned();
            $table->string('nome');
            $table->integer('numero_ordem');
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->timestamps();
        });

        Schema::table('animes', function (Blueprint $table) {
            $table->foreign('colecao_id')->references('id')->on('colecao_animes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
