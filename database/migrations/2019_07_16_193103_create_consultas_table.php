<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->text('descripcion');
            $table->string('solicitud_user_id');
            $table->string('respuesta_user_id');
          
            $table->string('tipo_consulta');
            $table->string('estado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consultas');
    }
}
