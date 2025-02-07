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
            $table->increments('id')->unsigned();
            $table->timestamp('fecha_inicio') -> nullable();
            $table->timestamp('fecha_fin') -> nullable();
            $table->integer(column: 'id_orden')->unsigned();
            $table->integer(column: 'id_operador')->unsigned();
            $table->foreign('id_orden')->references('id')->on('orden')->onDelete('cascade');
            $table->foreign('id_operador')->references('id')->on('operador')->onDelete('cascade');
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
