<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol->acceso === 1) {
            return view('diagnosticos.index',[
                'tecnicos' => User::where('rol_id', 2)->where('rol_id' , '!=', 1)->get(),
                'equipos' => Equipo::all(),
                'diagnosticos'=> Diagnostico::all()
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
            Diagnostico::create($request->all());
            return redirect('/diagnosticos');
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
        $diagnostico=Diagnostico::with('tecnico', 'equipo')->where('id',$id)->first();
        return response()->json($diagnostico);
    }

    public function actualizar(Request $request)
    {        
        if (Auth::user()->rol->edit === 1) {
            $diagnostico=Diagnostico::where('id',$request->only('id'))->first();
            $diagnostico->update($request->except('_token', 'id'));
            return redirect('/diagnosticos');
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
    public function destroy( Diagnostico $diagnostico)
    {
        if(Auth::user()->rol->delete===1){
            $diagnostico ->delete();
            return redirect('/diagnosticos');
        }
        return abort(403, "No tienes los permisos para Eliminar");
    }
}
