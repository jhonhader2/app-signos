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
        Schema::create('toma_signos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('users');
            $table->foreignId('medico_id')->constrained('users');
            $table->double('temperatura')->nullable(true);
            $table->double('tension_arterial')->nullable(true);
            $table->double('saturacion_oxigeno');
            $table->double('frecuencia_cardiaca');
            $table->double('peso')->nullable(true);
            $table->double('talla')->nullable(true);
            $table->text('observaciones')->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toma_signos');
    }
};
