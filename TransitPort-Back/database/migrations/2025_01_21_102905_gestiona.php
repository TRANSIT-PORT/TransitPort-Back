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
        Schema::create(table: 'gestiona', callback: function (Blueprint $table) {
            $table->integer('id_grua')->unsigned();
            $table->integer('id_contenedor')->unsigned();
            $table->date(column: 'fecha');
            $table->time(column: 'hora');
            $table->foreign('id_grua')->references('id')->on('grua')->onDelete('cascade');
            $table->foreign('id_contenedor')->references('id')->on('contenedor')->onDelete('cascade');
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
