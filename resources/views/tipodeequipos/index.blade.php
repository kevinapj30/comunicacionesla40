@extends('layouts.app')
@section('content')
    
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Tipo de Equipos</h1>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lista de tipo de equipos</h5>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNewTipoEquipo">
                        Agregar tipo equipo
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Tipo</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipoEquipos as $tipoEquipo)
                                    <tr>
                                        <td>{{$tipoEquipo->id}}</td>
                                        <td>{{$tipoEquipo->tipo}}</td>
                                        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showTipoEquipo" onclick="showTipoEquipo({{$tipoEquipo->id}})"><i class="align-middle" data-feather="eye"></i></button></td>
                                        <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTipoEquipo" onclick="editTipoEquipo({{$tipoEquipo->id}})"><i class="align-middle" data-feather="edit"></i></button></td>
                                        <td>
                                            <form action="{{ route('tipo-de-equipos.destroy', $tipoEquipo) }}" method="post">
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
<div class="modal fade" id="addNewTipoEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('tipo-de-equipos.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Tipo de Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Tipo de Equipo</label>
                    <input type="text" name="tipo" class="form-control">                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editTipoEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('tipo-de-equipos.actualizar')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="Eid">
                    <label>Tipo de Equipo</label>
                    <input type="text" name="tipo" id="EtipoEquipo" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="showTipoEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
        
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver Equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table>
                    <tr>
                        <td>Tipo de Equipo:</td>
                        <td id="StipoEquipo"></td>
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
        function editTipoEquipo(id){
            $.ajax({
                url:'http://127.0.0.1:8000/tipo-de-equipos/'+id+'/edit',
                method:'GET',
                success:function(data){
                    console.log(data);
                    $('#Eid').val(data.id)
                    $('#EtipoEquipo').val(data.tipo)
                }
            })
        }
        function showTipoEquipo(id){
            $.ajax({
                url:'http://127.0.0.1:8000/tipo-de-equipos/'+id+'/edit',
                method:'GET',
                success:function(data){
                    console.log(data);
                    $('#Sid').html(data.id)
                    $('#StipoEquipo').html(data.tipo);
                   
                }
            })
        }
    </script>
@endpush