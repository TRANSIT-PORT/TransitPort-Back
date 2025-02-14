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
        Schema::create(table: 'orden', callback: function (Blueprint $table) {
            $table->id();
            $table->text(column: 'tipo');
            $table->integer(column: 'cantidad_contenedores');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['Por empezar', 'En curso', 'Completada']);
            $table->integer('id_grua')->unsigned();
            $table->integer('id_administrativo')->unsigned();
            $table->integer('id_buque')->unsigned();
            $table->integer('id_zona')->unsigned();
            $table->foreign('id_administrativo')->references('id')->on('administrativo')->onDelete('cascade');
            $table->foreign('id_grua')->references('id')->on('grua')->onDelete('cascade');
            $table->foreign('id_buque')->references('id_buque')->on('tiene')->onDelete('cascade');
            $table->foreign('id_zona')->references('id')->on('zona')->onDelete('cascade');
            $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
