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
        Schema::table('productos', function (Blueprint $table) {
            
         //   para eliminar una llave foranea
        // $table->dropForeign('productos_categoria_id_foreign');
        // elimina el campo de la llave foranea
        //$table->dropColumn('categoria_id');

        //  $table->unsignedBigInteger('categoria_id')->nullable();

        //  $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');

        });
    }

};
