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
        Schema::create(table: 'pertenece', callback: function (Blueprint $table) {
            $table->integer('id_grua')->unsigned();
            $table->integer('id_zona')->unsigned();
            $table->date('fecha');
            $table->time('hora');
            $table->foreign('id_grua')->references('id_grua')->on('SC')->onDelete('cascade');
            $table->foreign('id_zona')->references('id')->on('zona')->onDelete('cascade');
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
