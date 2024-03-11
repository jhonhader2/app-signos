@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Toma de Signos</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-fuchsia card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Registrar toma de signos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible my-2">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('toma-signos.store') }}" method="POST">
                            @csrf
                            <div class="form-group form-group-sm">
                                <label for="paciente_id">Paciente</label>
                                <select name="paciente_id" id="paciente_id" class="form-control form-control-sm">
                                    {{-- @foreach ($pacientes as $paciente) 
                                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                        @endforeach --}}
                                    <option value="1" selected>Blanca Estela Gonzalez de Rodriguez</option>
                                </select>
                                @error('paciente_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-md-2">
                                    <div class="form-group form-group-sm">
                                        <label for="temperatura">Temperatura</label>
                                        <input type="number" step="0.01" name="temperatura" id="temperatura"
                                            class="form-control form-control-sm">
                                        @error('temperatura')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-group-sm">
                                        <label for="presion">Presión</label>
                                        <input type="number" step="0.01" name="presion" id="presion"
                                            class="form-control form-control-sm">
                                        @error('presion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-group-sm">
                                        <label for="saturacion_oxigeno">Saturación de Oxígeno</label>
                                        <input type="number" step="0.01" name="saturacion_oxigeno"
                                            id="saturacion_oxigeno" class="form-control form-control-sm">
                                        @error('saturacion_oxigeno')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-group-sm">
                                        <label for="frecuencia_cardiaca">Frecuencia Cardiaca</label>
                                        <input type="number" step="0.01" name="frecuencia_cardiaca" id="frecuencia_cardiaca"
                                        class="form-control form-control-sm">
                                        @error('frecuencia_cardiaca')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-group-sm">
                                        <label for="peso">Peso</label>
                                        <input type="number" step="0.01" name="peso" id="peso"
                                            class="form-control form-control-sm">
                                        @error('peso')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-group-sm">
                                        <label for="talla">Talla</label>
                                        <input type="number" step="0.01" name="talla" id="talla"
                                            class="form-control form-control-sm">
                                        @error('talla')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="observaciones">Observaciones</label>
                                <textarea name="observaciones" id="observaciones" class="form-control form-control-sm"></textarea>
                                @error('observaciones')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- Add here extra scripts --}}
    {{-- <script src="/js/admin_custom.js"></script> --}}
@stop
