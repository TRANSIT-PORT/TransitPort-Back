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
        Schema::create(table: 'SC', callback: function (Blueprint $table) {
            $table->increments('id_grua')->unsigned();
            $table->text('nombre');
            $table->text('modelo');
            $table->text('marca');
            $table->text('estado');
            $table->enum('tipo', ['SC']);
            $table->integer('id_gestor')->unsigned();
            $table->foreign('id_grua')->references('id')->on('grua')->onDelete('cascade');
            $table->foreign('id_gestor')->references('id')->on('gestor')->onDelete('cascade');
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
