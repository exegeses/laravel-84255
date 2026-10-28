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
        Schema::create('productos', function (Blueprint $table) {
            $table->smallIncrements('id_producto');
            $table->string('producto', 50)->unique();
            $table->decimal('precio', 10, 2);
            $table->unsignedTinyInteger('id_marca');
            $table->unsignedTinyInteger('id_categoria');
            $table->string('descripcion', 1000)->nullable();
            $table->string('imagen', 50)->nullable();
            $table->boolean('destacado')->default(false);
            $table->boolean('activo')->default(true);

            $table->foreign('id_marca')->references('id_marca')->on('marcas');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
