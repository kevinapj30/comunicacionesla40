@extends('layouts.app')
@section('content')
    
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Usuarios</h1>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lista de usuarios</h5>
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addNewUser">
                        Agregar nuevo usuario
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->rol->rol }}</td>
                                        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#showUsuario" onclick="showUsuario({{$usuario->id}})"><i class="align-middle" data-feather="eye"></i></button></td>
                                        <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editUsuario" onclick="editUsuario({{$usuario->id}})"><i class="align-middle" data-feather="edit"></i></button></td>
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
<div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('usuarios.store')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Tipo de Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control">
                    <label>Correo</label>
                    <input type="email" name="email" class="form-control"> 
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control">
                    <label>Rol</label></br>
                    <select name="rol_id" class="form-control">
                        <option value="">--Seleccione un rol--</option>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('usuarios.actualizar')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registar Equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="Eid">
                    <label>Nombre</label>
                    <input type="text" name="name" id="Ename" class="form-control">
                    <label>Correo</label>
                    <input type="email" name="email" id="Eemail" class="form-control"> 
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control">
                    <label>Rol</label></br>
                    <select name="rol_id" id="Erole" class="form-control">
                        <option value="">--Seleccione un rol--</option>
                        @foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="showUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
           
        
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table>
                    <tr>
                        <td>Name:</td>
                        <td id="Sname"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td id="Semail"></td>
                    </tr>
                    <tr>
                        <td>Role:</td>
                        <td id="Srole"></td>
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
        function editUsuario(id){
            $.ajax({
                url:'http://127.0.0.1:8000/usuarios/'+id+'/edit',
                method:'GET',
                success:function(data){
                    console.log(data);
                    $("#Eid").val(data.id)
                    $("#Ename").val(data.name)
                    $("#Eemail").val(data.email)
                    $("#Erole").val(data.rol_id)
                }
            })
        }
        function showUsuario(id){
            $.ajax({
                url:'http://127.0.0.1:8000/usuarios/'+id+'/edit',
                method:'GET',
                success:function(data){
                    console.log(data);
                    $("#Sname").html(data.name)
                    $("#Semail").html(data.email)
                    $("#Srole").html(data.rol.rol)
                   
                }
            })
        }
    </script>
@endpush