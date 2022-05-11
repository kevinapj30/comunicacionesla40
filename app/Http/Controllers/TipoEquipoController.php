<?php

namespace App\Http\Controllers;

use App\Models\TipoDeEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol->acceso === 1) {
            return view('tipodeequipos.index', ['tipoEquipos' => TipoDeEquipo::all()]);
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
            TipoDeEquipo::create($request->all());
            return redirect('/tipo-de-equipos');
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
        $tipoEquipos = TipoDeEquipo::where('id', $id)->first();
        return response()->json($tipoEquipos);
    }

    public function actualizar(Request $request)
    {
        if (Auth::user()->rol->edit === 1) {
            $tipoEquipo = TipoDeEquipo::where('id', $request->only('id'))->first();
            $tipoEquipo->update($request->except('id', '_token'));
            return redirect('/tipo-de-equipos');
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
    public function destroy(TipoDeEquipo $tipoEquipo)
    {
        if (Auth::user()->rol->delete === 1) {
            $tipoEquipo->delete();
            return redirect('/tipo-de-equipos');
        }
        return abort(403, "No tienes los permisos para actualizar"); 
    }
}
