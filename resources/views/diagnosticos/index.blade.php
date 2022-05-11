@extends('layouts.app')
@section('content')
    
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Diagnosticos</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Listado Diagnosticos</h5>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNewDiagnotico">
                        Agregar nuevo diagnostico
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Tecnico</th>
                                    <th>Equipo</th>
                                    <th>FechadeLlegada</th>
                                    <th>Diagnostico</th>
                                    <th>Procedimientos</th>
                                    <th>Repuestos</th>
                                    <th>PersonalEncargado<th
                                    <th>FechadeSalida</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diagnosticos as $diagnostico)
                                    <tr>
                                        <td>{{ $diagnostico->id}}</td>
                                        <td>{{ $diagnostico->tecnico->name }}</td>
                                        <td>{{ $diagnostico->equipo->Marca }}</td>
                                        <td>{{ $diagnostico->FechadeLlegada}}</td>
                                        <td>{{ $diagnostico->Diagnostico}}</td>
                                        <td>{{ $diagnostico->Procedimientos}}</td>
                                        <td>{{ $diagnostico->Repuestos}}</td>
                                        <td>{{ $diagnostico->PersonalEncargado}}</td>
                                        <td>{{ $diagnostico->FechadeSalida}}</td>
                                        
                                        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showDiagnostico" onclick="showDiagnostico({{$diagnostico->id}})"><i class="align-middle" data-feather="eye"></i></button></td>
                                        <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDiagnostico" onclick="editDiagnostico({{$diagnostico->id}})"><i class="align-middle" data-feather="edit"></i></button></td>
                                        <td>
                                            <form action="{{ route('diagnosticos.destroy', $diagnostico) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="align-middle" data-feather="trash"></i></button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="addNewDiagnotico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('diagnosticos.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Diagnoticos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Tecnico</label></br>
                    <select name="tecnico_id" class="form-control">
                        <option value="">--Seleccione un encargado--</option>
                        @foreach($tecnicos as $tecnico)
                            <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
                        @endforeach
                    </select>
                    <label>Equipos</label></br>
                    <select name="equipo_id" class="form-control">
                        <option value="">--Seleccione un equipo--</option>
                        @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->Marca }}</option>
                        @endforeach
                    </select>
                    <label>FechadeLlegada</label></br>
                    <input type="date" name="FechadeLlegada" id="FechadeLlegada"  class="form-control"></br>
                    <label>Diagnostico</label></br>
                    <input type="text" name="Diagnostico" id="Diagnostico" class="form-control"></br>
                    <label>Procedimientos</label></br>
                    <input type="text" name="Procedimientos" id="Procedimientos" class="form-control"></br>
                    <label>Repuestos</label></br>
                    <input type="text" name="Repuestos" id="Repuestos" class="form-control"></br>
                    <label>PersonalEncargado</label></br>
                    <input type="text" name="PersonalEncargado" id="PersonalEncargado" class="form-control"></br>
                    <label>FechadeSalida</label></br>
                    <input type="date" name="FechadeSalida" id="Fechadesalida" class="form-control"></br>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editDiagnostico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('diagnosticos.actualizar')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Diagnoticos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="Eid">
                    <select name="tecnico_id" id="ETecnico" class="form-control">
                        <option value="">--Seleccione un encargado--</option>
                        @foreach($tecnicos as $tecnico)
                            <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
                        @endforeach
                    </select>
                    <label>Equipos</label></br>
                    <select name="equipo_id" id="EEquipo" class="form-control">
                        <option value="">--Seleccione un equipo--</option>
                        @foreach($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->Marca }}</option>
                        @endforeach
                    </select>
                    <label>FechadeLlegada</label></br>
                    <input type="date" name="FechadeLlegada" id="EFechadeLlegada"  class="form-control"></br>
                    <label>Diagnostico</label></br>
                    <input type="text" name="Diagnostico" id="EDiagnostico" class="form-control"></br>
                    <label>Procedimientos</label></br>
                    <input type="text" name="Procedimientos" id="EProcedimientos" class="form-control"></br>
                    <label>Repuestos</label></br>
                    <input type="text" name="Repuestos" id="ERepuestos" class="form-control"></br>
                    <label>PersonalEncargado</label></br>
                    <input type="text" name="PersonalEncargado" id="EPersonalEncargado" class="form-control"></br>
                    <label>FechadeSalida</label></br>
                    <input type="date" name="FechadeSalida" id="EFechadeSalida" class="form-control"></br>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="showDiagnostico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
                
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver Diagnosticos </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table>

                    <tr>
                        <td>Tecnico:</td>
                        <td id="STecnico"></td>
                    </tr>
                    <tr>
                        <td>Equipo:</td>
                        <td id="SEquipo"></td>
                    </tr>
                    <tr>
                        <td>FechadeLlegada:</td>
                        <td id="SFechadeLlegada"></td>
                    </tr>
                    <tr>
                        <td>Diagnostico:</td>
                         <td id="SDiagnostico"></td>
                    </tr>
                    <tr>
                        
                        <td>Procedimientos:</td>
                        <td id="SProcedimientos"></td>
                    </tr>
                    <tr>
                        
                        <td>Repuestos:</td>
                        <td id="SRepuestos"></td>
                    </tr>
                      
                    <tr>
                        <td>PersonalEncargado:</td>
                        <td id="SPersonalEncargado"></td>
                    </tr>
                     
                    <tr>
                        <td>FechadeSalida:</td>
                        <td id="SFechadeSalida"></td>
                    </tr>
                    
                   
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
             </div>
            
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>
        function editDiagnostico(id){
            $.ajax({
                url:'http://127.0.0.1:8000/diagnosticos/'+id+'/edit',
                method:'GET',
                success:function(data){
                    console.log(data);
                    $('#Eid').val(data.id)
                    $("#ETecnico").val(data.tecnico_id)
                    $("#EEquipo").val(data.equipo_id)
                    $('#EFechadeLlegada').val(data.FechadeLlegada)
                    $('#EDiagnostico').val(data.Diagnostico)
                    $('#EProcedimientos').val(data.Procedimientos)
                    $('#ERepuestos').val(data.Repuestos)
                    $('#EPersonalEncargado').val(data.PersonalEncargado)
                    $('#EFechadeSalida').val(data.FechadeSalida)
                }
            })
        }
        function showDiagnostico(id){
            $.ajax({
                url:'http://127.0.0.1:8000/diagnosticos/'+id+'/edit',
                method:'GET',
                success:function(data){
                    console.log(data);
                    $('#Sid').html(data.id)
                    $("#STecnico").html(data.tecnico.name)
                    $("#SEquipo").html(data.equipo.Marca)
                    $('#SFechadeLlegada').html(data.FechadeLlegada)
                    $('#SDiagnostico').html(data.Diagnostico)
                    $('#SProcedimientos').html(data.Procedimientos)
                    $('#SRepuestos').html(data.Repuestos)
                    $('#SPersonalEncargado').html(data.PersonalEncargado)
                    $('#SFechadeSalida').html(data.FechadeSalida)
                }
            })
        }
    </script>
@endpush