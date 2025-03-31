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
        Schema::create('tiene_truck', function (Blueprint $table) {

            $table->string('ubicacion');
            $table->string('destino');
            $table->string('tipo_destino');
            $table->foreignId('id_truck')->constrained('trucks')->onDelete('cascade');
            $table->foreignId('id_contenedor')->constrained('contenedor')->onDelete('cascade');
            // Definir clave primaria compuesta
            $table->primary(['id_truck', 'id_contenedor']);

            // Definir claves foráneas


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
