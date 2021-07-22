<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->id();
            $table->longText('pregunta1');
            $table->longText('pregunta2')->nullable();
            $table->longText('pregunta3')->nullable();
            $table->longText('pregunta4')->nullable();
            $table->longText('pregunta5')->nullable();
            $table->longText('pregunta6');
            $table->longText('pregunta7');
            $table->longText('pregunta8')->nullable();
            $table->longText('pregunta9');
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
        Schema::dropIfExists('encuesta');
    }
}
