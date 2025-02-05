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
        Schema::create(table: 'contenedor', callback: function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->enum('estado', ['Por empezar', 'En curso', 'Completada']);
            $table->integer(column: 'id_zona')->unsigned();
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
