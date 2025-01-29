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
        Schema::create(table: 'tiene', callback: function (Blueprint $table) {
            $table->integer('id_buque')->unsigned();
            $table->integer('id_contenedor')->unsigned();
            $table->foreign('id_buque')->references('id')->on('buque')->onDelete('cascade');
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
