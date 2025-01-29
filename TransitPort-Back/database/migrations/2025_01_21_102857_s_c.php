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
            $table->float(column: 'capacidad_carga');
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
