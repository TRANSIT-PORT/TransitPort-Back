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
        Schema::create('grua', callback: function (Blueprint $table) {
            $table->id();
            $table->float('capacidad_carga');
            $table->text('estado');
            $table->foreignId('id_gestor')->constrained('gestor');
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
