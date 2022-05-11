<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol->acceso === 1) {
            return view('usuarios.index', [
                'roles' => Rol::where('id', '!=', 1)->get(),
                'usuarios' => User::where('rol_id', '!=', 1)->get()
            ]);
        }
        return abort(403, "No tienes los permisos para actualizar");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->rol->create === 1) {
            $usuario = $request->all();
            $usuario['password'] = Hash::make($request->password);
            User::create($usuario);
            return redirect('/usuarios');
        }
        return abort(403, "No tienes los permisos para actualizar");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::with('rol')->where('id', $id)->first();
        return response()->json($usuario);
    }

    public function actualizar(Request $request)
    {
        if (Auth::user()->rol->edit === 1) {
            $data = $request->except('id', '_token', 'password');
            if (!empty($request['password'])) {
                $data['password'] = Hash::make($request->password);
            }
            $usuario = User::where('id', $request->only('id'))->first();
            $usuario->update($data);
            return redirect('/usuarios');
        }
        return abort(403, "No tienes los permisos para actualizar");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
