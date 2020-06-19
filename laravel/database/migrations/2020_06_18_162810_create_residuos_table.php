<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResiduosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residuos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('tipo', 255);
            $table->string('categoria', 255);
            $table->string('tecnologia_tratamento', 255);
            $table->string('classe', 255);
            $table->string('unidade_medida', 255);
            $table->integer('peso')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residuos');
    }
}
