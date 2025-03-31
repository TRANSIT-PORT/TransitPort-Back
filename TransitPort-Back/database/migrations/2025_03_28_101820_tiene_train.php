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
        Schema::create('tiene_train', function (Blueprint $table) {

            $table->string('ubicacion');
            $table->string('destino');
            $table->string('tipo_destino');
            $table->foreignId('id_train')->constrained('trains')->onDelete('cascade');
            $table->foreignId('id_contenedor')->constrained('contenedor')->onDelete('cascade');
            // Definir clave primaria compuesta
            $table->primary(['id_train', 'id_contenedor']);

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
