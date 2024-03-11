<?php

namespace App\Http\Controllers;

use App\Models\TomaSignos;
use App\Http\Requests\StoreTomaSignosRequest;
use App\Http\Requests\UpdateTomaSignosRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

// use Spatie\Permission\Models\Role;

class TomaSignosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        return view('toma-signos.index')->with('tomaSignos', TomaSignos::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        // return view('toma-signos.create')->with('pacientes', Role::findByName('paciente')->users);

        return view('toma-signos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTomaSignosRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();
            $validated['medico_id'] = auth()->id();

            TomaSignos::create($validated);

            return redirect()->route('toma-signos.index')->with('success', 'Toma de signos creada');
        } catch (\Throwable $e) {
            //mensaje de error al log
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Error al crear la toma de signos');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(TomaSignos $tomaSignos): View
    {
        //
        return view('toma-signos.show')->with('tomaSignos', $tomaSignos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TomaSignos $tomaSignos): View
    {
        //
        return view('toma-signos.edit')->with('tomaSignos', $tomaSignos);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTomaSignosRequest $request, TomaSignos $tomaSignos): RedirectResponse
    {
        try {
            $tomaSignos->update($request->validated());
            return redirect()->back()->with('success', 'Toma de signos actualizada');
        } catch (\Throwable $e) {
            //mensaje de error al log
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Error al actualizar la toma de signos');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TomaSignos $tomaSignos): RedirectResponse
    {
        try {
            $tomaSignos->delete();
            return redirect()->back()->with('success', 'Toma de signos eliminada');
        } catch (\Throwable $e) {
            //mensaje de error al log
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Error al eliminar la toma de signos');
        }
    }

    //Api
    public function updateSaturacionOxigenoChart()
    {
        $observaciones = rand(0, 1) ? 'Toma acostada' : 'Toma sentada';

        TomaSignos::create([
            'paciente_id' => 1,
            'medico_id' => 1,
            'temperatura' => null,
            'tension_arterial' => null,
            'saturacion_oxigeno' => rand(0, 100),
            'frecuencia_cardiaca' => rand(60, 250),
            'peso' => null,
            'talla' => null,
            'observaciones' => $observaciones,
        ]);

        $tomaSignos = TomaSignos::latest()->take(20)->get()->sortBy('created_at');
        $labels = $tomaSignos->map(function ($tomaSigno) {
            return $tomaSigno->created_at->format('H:i:s');
        })->values();
        $data = $tomaSignos->pluck('saturacion_oxigeno');

        return response()->json(compact('labels', 'data'));
    }

    public function updateFrecuenciaCardiacaChart()
    {
        $tomaSignos = TomaSignos::latest()->take(20)->get()->sortBy('created_at');
        $labels = $tomaSignos->map(function ($tomaSigno) {
            return $tomaSigno->created_at->format('H:i:s');
        })->values();
        $data = $tomaSignos->pluck('frecuencia_cardiaca');

        return response()->json(compact('labels', 'data'));
    }
}
