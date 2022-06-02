<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            //$table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreignId('usuario_id')->constrained('usuarios');
            //$table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->string('titulo');
            $table->string('imagen');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
