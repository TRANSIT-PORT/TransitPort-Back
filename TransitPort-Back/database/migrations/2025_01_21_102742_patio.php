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
        Schema::create('patio', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->float('x');
            $table->float('y');
            $table->float('z');
            $table->integer(column: 'capacidad');
            $table->integer(column: 'id_gestor')->unsigned();
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
