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
        Schema::create(table: 'turno', callback: function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_inicio') -> nullable();
            $table->timestamp('fecha_fin') -> nullable();
            $table->foreignId('id_orden')->constrained('orden')->onDelete('cascade');
            $table->foreignId('id_operador')->constrained('operador')->onDelete('cascade');
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
