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
        Schema::create(table: 'utiliza', callback: function (Blueprint $table) {
            $table->integer('id_grua')->unsigned();
            $table->integer('id_operador')->unsigned();
            $table->time(column: 'hora_inicio');
            $table->time(column: 'hora_fin');
            $table->foreign('id_grua')->references('id')->on('grua')->onDelete('cascade');
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
