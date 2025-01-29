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
        Schema::create('zona', callback: function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('ubicacion');
            $table->integer(column: 'capacidad');
            $table->integer(column: 'id_gestor')->unsigned();
            $table->integer(column: 'id_patio')->unsigned();
            $table->integer(column: 'id_grua')->unsigned();
            $table->foreign('id_gestor')->references('id')->on('gestor')->onDelete('cascade');
            $table->foreign('id_patio')->references('id')->on('patio')->onDelete('cascade');
            $table->foreign('id_grua')->references('id')->on('grua')->onDelete('cascade');
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
