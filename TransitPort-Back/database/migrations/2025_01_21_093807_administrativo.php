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
        Schema::create('administrativo', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('nombre');
            $table->text(column: 'usuario');
            $table->text(column: 'password');
            $table->enum('cargo', ['administrativo']);
            $table->integer(column: 'id_gestor')->unsigned();
            $table -> foreign('id') -> references('id') -> on('users') -> onDelete('cascade');
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
