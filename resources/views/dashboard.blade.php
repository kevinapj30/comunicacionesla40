@extends('layouts.app')
@section('content')
    
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Dahsboard</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">Welcome!</h3>
                </div>
                <div class="card-body">
                    <h2>COMUNICACIONES LA 40</h2>
                    <h3> una empresa con mas de 15 años de experiencia en servicios de soporte y mantenimiento que van dirigidos a todos los equipos tecnologicos.</h3>
                    <h3> Nuestros profesionales evaluarán, registrarán y solucionarán cualquier problema con tus equipos, te proporcionarán un reporte y mantendrán actualizada la hoja de vida de tus equipos.</h3>
                    <br>
                    <h2>Nuestros Servicios</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td><h1>Servicio Tecnico</h1></td>
                                <td><h1>Mantenimiento</h1></td>
                                <td><h1>Reparacion</h1></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/icons/servicio_tecnico.png "class="d-block mx-auto" width="40%" height="40%" alt="...">
                                </td>
                                <td>
                                    <img src="img/icons/mantenimiento.png "class="d-block mx-auto" width="40%" height="40%" alt="...">
                                </td>
                                <td>
                                    <img src="img/icons/reparacion.png "class="d-block mx-auto" width="40%" height="40%"" alt="...">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>

@endsection

