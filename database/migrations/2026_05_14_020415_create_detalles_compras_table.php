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
        Schema::create('detalles_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained();
            $table->foreignId('videojuego_id')->constrained();
            $table->integer('cantidad');
            $table->decimal('subTotal', 5,2);
            $table->decimal('precio_venta', 5,2);
            $table->decimal('porcentajeIva', 5,2);
            $table->decimal('iva', 5,2);
            $table->decimal('total', 5,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_compras');
    }
};
