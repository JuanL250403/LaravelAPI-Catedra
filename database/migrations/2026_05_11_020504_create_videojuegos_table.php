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
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->integer('cantidad');
            $table->boolean('vigente')->default(true);
            $table->text('requisitos_de_sistema');
            $table->decimal('calificacion', 2,1);
            $table->decimal('precio_unitario', 5,2);
            $table->decimal('valor_total');
            $table->foreignId('categoria_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videojuegos');
    }
};
