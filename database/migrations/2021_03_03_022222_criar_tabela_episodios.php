<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaEpisodios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodios', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->integer('temporada');
            $table->integer('numero');
            $table->boolean('assistido')->default(0);
            $table->integer('serie_id');

            //adicionando foreign key
            $table->foreign('serie_id')
                ->references('series')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodios');
    }
}
