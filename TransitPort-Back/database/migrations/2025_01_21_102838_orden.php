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
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['Por empezar', 'En curso', 'Completada']);
            $table->foreignId('id_administrativo')->constrained('administrativo')->onDelete('cascade');
            $table->foreignId('id_grua')->constrained('grua')->onDelete('cascade');
            $table->foreignId('id_buque')->constrained('buque')->onDelete('cascade');
            $table->foreignId('id_zona')->constrained('zona')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
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
