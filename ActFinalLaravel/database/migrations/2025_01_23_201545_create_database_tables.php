<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('database_tables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/

        Schema::create('categoria', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();
        });

        Schema::create('catalogo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('unidades');
            $table->string('precio_unidad');
            $table->string('categoria');
            $table->timestamps();
        });

        Schema::create('carrito', function (Blueprint $table) {
            $table->id();
            $table->string('producto');
            $table->string('cantidad');
            $table->string('precio_unidad');
            $table->string('total');
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
        Schema::dropIfExists('database_tables');
    }
};
