<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('nome');
            $table->string('email')->primary();
            $table->integer('receita_id')->nullable();
            $table->integer('lista_id')->nullable();
            $table->date('nascimento');
            $table->boolean('ccredito');
            $table->boolean('cdebito');
            $table->boolean('boleto');
            $table->string('password');
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
        Schema::dropIfExists('usuarios');
    }
}
