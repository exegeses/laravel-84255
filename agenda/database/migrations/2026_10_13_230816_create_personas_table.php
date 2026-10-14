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
        Schema::create('personas', function (Blueprint $table) {
            //id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            $table->smallIncrements('id');
            //nombre VARCHAR(50) NOT NULL,
            $table->string('nombre', 50);
            //apellido VARCHAR(50) NOT NULL,
            $table->string('apellido', 50);
            //dni VARCHAR(20) NOT NULL UNIQUE,
            $table->string('dni', 20)->unique();
            //telefono VARCHAR(30),
            $table->string('telefono', 30)->nullable();
            //nacimiento DATE
            $table->date('nacimiento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
