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
        Schema::create('tiene', function (Blueprint $table) {
            $table->unsignedInteger('id_buque');
            $table->unsignedInteger('id_contenedor');
            $table->integer('ubicacion');
            $table->integer('destino');
            $table->enum('tipo_destino', ['Buque', 'Zona']);
            
            // Definir clave primaria compuesta
            $table->primary(['id_buque', 'id_contenedor']);
            
            // Definir claves foráneas
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
