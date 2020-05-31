<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGeneroLibro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_libro', function (Blueprint $table) {
            
            $table->bigInteger('genero_id')->unsigned();
            $table->bigInteger('libro_id')->unsigned();

            $table->primary('genero_id','libro_id');

            $table->foreign('genero_id')
                ->references('id')
                ->on('generos')
                ->onDelete('cascade');

            $table->foreign('libro_id')
                ->references('id')
                ->on('libros')
                ->onDelete('cascade');

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
        Schema::dropIfExists('genero_libro');
    }
}
