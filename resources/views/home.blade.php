@extends('layouts.app')
@section('content')
    
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Home</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Datos de mi equipo</h3>
                </div>
                <div class="card-body">
                    @if(!empty($miEquipo))
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Tipo de equipo:</td>
                                <td>{{ $miEquipo->tipoEquipo->tipo }}</td>
                            </tr>
                            <tr>
                                <td>Marca:</td>
                                <td>{{ $miEquipo->Marca }}</td>
                            </tr>
                            <tr>
                                <td>Modelo:</td>
                                <td>{{ $miEquipo->Modelo }}</td>
                            </tr>
                            <tr>
                                <td>Codigo Serial:</td>
                                <td>{{ $miEquipo->CodigoSerial}}</td>
                            </tr>
                            <tr>
                                <td>IMEI:</td>
                                <td>{{ $miEquipo->IMEI }}</td>
                            </tr>
                            <tr>
                                <td>Caracteristicas:</td>
                                <td>{{ $miEquipo->Caracteristicas }}</td>
                            </tr>
                            @if(!empty($miEquipo->oneDiagnostico))
                                <tr>
                                    <td>Tecnico Encargado:</td>
                                    <td>{{ $miEquipo->oneDiagnostico->tecnico->name }}</td>
                                </tr>
                                <tr>
                                    <td>Fecha Llegada:</td>
                                    <td>{{ $miEquipo->oneDiagnostico->FechadeLlegada }}</td>
                                </tr>
                                <tr>
                                    <td>Prcedimientos:</td>
                                    <td>{{ $miEquipo->oneDiagnostico->Procedimientos }}</td>
                                </tr>
                                <tr>
                                    <td>Diagnostico:</td>
                                    <td>{{ $miEquipo->oneDiagnostico->Repuestos }}</td>
                                </tr>
                                <tr>
                                    <td>Fecha de Salida:</td>
                                    <td>{{ $miEquipo->oneDiagnostico->FechadeSalida }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="2"><h6 class="text-center fw-bolder">No hay diagnostico</h6></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    @else
                    <h1>No tienes un equipo registrado</h1>
                    @endif
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection

