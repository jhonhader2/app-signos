@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Toma de Signos</h1>
@stop

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title"><b>Consolidado de toma de signos vitales</b></div>
            <div class="card-tools">
                <a href="{{ route('toma-signos.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Agregar
                </a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Paciente</th>
                                    <th>Pulso</th>
                                    <th>Saturación</th>
                                    <th colspan="3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tomaSignos as $tomaSigno)
                                    <tr class="text-center">
                                        <td>{{ $tomaSigno->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $tomaSigno->created_at->format('H:i') }}</td>
                                        <td>{{ $tomaSigno->paciente->name }}</td>
                                        <td>{{ $tomaSigno->saturacion_oxigeno }}</td>
                                        <td>{{ $tomaSigno->frecuencia_cardiaca }}</td>
                                        <td>
                                            <a href="{{ route('toma-signos.show', $tomaSigno->id) }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Ver
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('toma-signos.edit', $tomaSigno->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                        </td>
                                        <td>
                                            <form id="delete-form-{{ $tomaSigno->id }}"
                                                action="{{ route('toma-signos.destroy', $tomaSigno->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button"
                                                    data-id="{{ $tomaSigno->id }}">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">No hay registros para mostrar.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
    <script>
        var deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var id = this.getAttribute('data-id');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¿Estás seguro de que deseas eliminar este tema?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'No, cancelar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                })
            });
        });
    </script>
@stop
