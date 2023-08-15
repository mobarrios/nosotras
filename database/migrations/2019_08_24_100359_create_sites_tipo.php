<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sites_tipo', function (Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->text('name');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites_tipo');
    }
}
