<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\TipoDeEquipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnValueMap;


class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol->acceso === 1) {
            return view('equipos.index',[
                'tipoEquipos' => TipoDeEquipo::all(),
                'clientes' => User::with('rol')->get(),
                'equipos'=> Equipo::all()
            ]);
        }
        return abort(403, "No tienes los permisos para ingresar"); 
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
            Equipo::create($request->all());
            return redirect('/equipos');
        }

        return abort(403, "No tienes los permisos para registrar");
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
        $equipo=Equipo::with('tipoEquipo', 'cliente')->where('id',$id)->first();
        return response()->json($equipo);
    }

    public function actualizar(Request $request)
    {       
        if (Auth::user()->rol->edit === 1) {
            $equipo=Equipo::where('id',$request->only('id'))->first();
            $equipo->update($request->except('_token', 'id'));
            return redirect('/equipos');
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
    public function update(Request $request, $id){}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        if(Auth::user()->rol->delete===1){
            $equipo ->delete();
            return redirect('/equipos');
        }
        return abort(403, "No tienes los permisos para Eliminar");
    }
}
