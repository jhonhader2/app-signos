<?php

namespace Database\Seeders;

use App\Models\TomaSignos;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TomaSignosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TomaSignos::factory()->create([
            'paciente_id' => 1,
            'medico_id' => 1,
            'temperatura' => null,
            'tension_arterial' => null,
            'saturacion_oxigeno' => 87,
            'frecuencia_cardiaca' => 93,
            'peso' => null,
            'talla' => null,
            'observaciones' => 'Toma acostada',
            'created_at' => Carbon::parse('2024-03-10 10:00'),
        ]);

        TomaSignos::factory()->create([
            'paciente_id' => 1,
            'medico_id' => 1,
            'temperatura' => null,
            'tension_arterial' => null,
            'saturacion_oxigeno' => 34,
            'frecuencia_cardiaca' => 95,
            'peso' => null,
            'talla' => null,
            'observaciones' => 'Toma sentada',
            'created_at' => Carbon::parse('2024-03-10 10:15'),
        ]);

        TomaSignos::factory()->create([
            'paciente_id' => 1,
            'medico_id' => 1,
            'temperatura' => null,
            'tension_arterial' => null,
            'saturacion_oxigeno' => 104,
            'frecuencia_cardiaca' => 90,
            'peso' => null,
            'talla' => null,
            'observaciones' => 'Toma sentada',
            'created_at' => Carbon::parse('2024-03-10 10:30'),
        ]);

        TomaSignos::factory()->create([
            'paciente_id' => 1,
            'medico_id' => 1,
            'temperatura' => null,
            'tension_arterial' => null,
            'saturacion_oxigeno' => 118,
            'frecuencia_cardiaca' => 85,
            'peso' => null,
            'talla' => null,
            'observaciones' => 'Toma acostada',
            'created_at' => Carbon::parse('2024-03-10 10:53'),
        ]);

        TomaSignos::factory()->create([
            'paciente_id' => 1,
            'medico_id' => 1,
            'temperatura' => null,
            'tension_arterial' => null,
            'saturacion_oxigeno' => 43,
            'frecuencia_cardiaca' => 96,
            'peso' => null,
            'talla' => null,
            'observaciones' => 'Toma sentada',
            'created_at' => Carbon::parse('2024-03-10 11:37'),
        ]);

        TomaSignos::factory()->create([
            'paciente_id' => 1,
            'medico_id' => 1,
            'temperatura' => null,
            'tension_arterial' => null,
            'saturacion_oxigeno' => 112,
            'frecuencia_cardiaca' => 88,
            'peso' => null,
            'talla' => null,
            'observaciones' => 'Toma acostada',
            'created_at' => Carbon::parse('2024-03-10 12:50'),
        ]);
    }
}
