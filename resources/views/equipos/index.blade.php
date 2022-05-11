@extends('layouts.app')
@section('content')
    
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Equipos</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Listados de los equipos</h5>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNewEquipo">
                        Agregar nuevo equipo
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>TipoEquipo</th>
                                    <th>Cliente</th>
                                    <th>Marca</th>
                                    <th>CodigoSerial</th>
                                    <th>IMEI</th>
                                    <th>Modelo</th>
                                    <th>Caracteristicas</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equipos as $equipo)
                                    <tr>
                                        <td>{{$equipo->id}}</td>
                                        <td>{{$equipo->tipoEquipo->tipo}}</td>
                                        <td>{{$equipo->cliente->name}}</td>
                                        <td>{{$equipo->Marca}}</td>
                                        <td>{{$equipo->CodigoSerial}}</td>    
                                        <td>{{$equipo->IMEI}}</td>
                                        <td>{{$equipo->Modelo}}</td>
                                        <td>{{$equipo->Caracteristicas}}</td>
                                        
                                        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showEquipo" onclick="showEquipo({{$equipo->id}})"><i class="align-middle" data-feather="eye"></i></button></td>
                                        <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editEquipo" onclick="editEquipo({{$equipo->id}})"><i class="align-middle" data-feather="edit"></i></button></td>
                                        <td>
                                            <form action="{{ route('equipos.destroy', $equipo) }}" method="post">
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
<div class="modal fade" id="addNewEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('equipos.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>TipoEquipo</label></br>
                    <select name="tipo_equipo_id" class="form-control">
                        <option value="">--Seleccione un tipo de equipo--</option>
                        @foreach($tipoEquipos as $tipoEquipo)
                            <option value="{{ $tipoEquipo->id }}">{{ $tipoEquipo->tipo }}</option>
                        @endforeach
                    </select>
                    <label>Clientes</label></br>
                    <select name="cliente_id" class="form-control">
                        <option value="">--Seleccione un cliente--</option>
                        @foreach($clientes as $cliente)
                            @if($cliente['rol']['id'] === 3)
                                <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Marca</label></br>
                    <input type="text" name="Marca" id="Marca" class="form-control"></br>
                    <label>CodigoSerial</label></br>
                    <input type="text" name="CodigoSerial" id="CodigoSerial" class="form-control"></br>
                    <label>IMEI</label></br>
                    <input type="text" name="IMEI" id="IMEI" class="form-control"></br>
                    <label>Modelo</label></br>
                    <input type="text" name="Modelo" id="Modelo" class="form-control"></br>
                    <label>Caracteristicas</label></br>
                    <input type="text" name="Caracteristicas" id="Caracteristicas" class="form-control"></br>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('equipos.actualizar')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="Eid" >
                    <label>TipoEquipo</label></br>
                    <select name="tipo_equipo_id" id="ETipoEquipo" class="form-control">
                        <option value="">--Seleccione un tipo de equipo--</option>
                        @foreach($tipoEquipos as $tipoEquipo)
                            <option value="{{ $tipoEquipo->id }}">{{ $tipoEquipo->tipo }}</option>
                        @endforeach
                    </select>
                    <label>Clientes</label></br>
                    <select name="cliente_id" id="ECliente" class="form-control">
                        <option value="">--Seleccione un cliente--</option>
                        @foreach($clientes as $cliente)
                            @if($cliente['rol']['id'] === 3)
                                <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Marca</label></br>
                    <input type="text" name="Marca" id="EMarca" class="form-control"></br>
                    <label>CodigoSerial</label></br>
                    <input type="text" name="CodigoSerial" id="ECodigoSerial" class="form-control"></br>
                    <label>IMEI</label></br>
                    <input type="text" name="IMEI" id="EIMEI" class="form-control"></br>
                    <label>Modelo</label></br>
                    <input type="text" name="Modelo" id="EModelo" class="form-control"></br>
                    <label>Caracteristicas</label></br>
                    <input type="text" name="Caracteristicas" id="ECaracteristicas" class="form-control"></br>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="showEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
        
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver Equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table>
                  
                    <tr>
                        <td>TipoEquipo:</td>
                        <td id="STipoEquipo"></td>
                    </tr>
                    <tr>
                        <td>Cliente:</td>
                        <td id="SCliente"></td>
                    </tr>
                    <tr>
                        <td>Marca:</td>
                         <td id="SMarca"></td>
                    </tr>
                    <tr>
                        
                        <td>CodigoSerial:</td>
                        <td id="SCodigoSerial"></td>
                    </tr>
                    <tr>
                        
                        <td>IMEI:</td>
                        <td id="SIMEI"></td>
                    </tr>
                      
                    <tr>
                        <td>Modelo:</td>
                        <td id="SModelo"></td>
                    </tr>
                     
                    <tr>
                        <td>Caracteristicas:</td>
                        <td id="SCaracteristicas"></td>
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
        function editEquipo(id){
            $.ajax({
                url:'http://127.0.0.1:8000/equipos/'+id+'/edit',
                method:'GET',
                success:function(data){
                    console.log(data);
                    $('#Eid').val(data.id)
                    $('#ETipoEquipo').val(data.tipo_equipo_id)
                    $("#ECliente").val(data.cliente_id)
                    $('#EMarca').val(data.Marca)
                    $('#ECodigoSerial').val(data.CodigoSerial)
                    $('#EIMEI').val(data.IMEI)
                    $('#EModelo').val(data.Modelo)
                    $('#ECaracteristicas').val(data.Caracteristicas)
                }
            })
        }
        function showEquipo(id){
            $.ajax({
                url:'http://127.0.0.1:8000/equipos/'+id+'/edit',
                method:'GET',
                success:function(data){
                    console.log(data);
                    $('#Sid').html(data.id)
                    $('#STipoEquipo').html(data.tipo_equipo.tipo)
                    $('#SCliente').html(data.cliente.name)
                    $('#SMarca').html(data.Marca)
                    $('#SCodigoSerial').html(data.CodigoSerial)
                    $('#SIMEI').html(data.IMEI)
                    $('#SModelo').html(data.Modelo)
                    $('#SCaracteristicas').html(data.Caracteristicas)
                   
                }
            })
        }
    </script>
@endpush