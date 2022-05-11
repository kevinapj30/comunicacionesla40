<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->rol_id === 1 || auth()->user()->rol_id === 2) {
            return view('dashboard');
        }

        $miEquipo = Equipo::with('oneDiagnostico')->where('cliente_id', auth()->user()->id)->first();
        return view('home', compact('miEquipo'));
    }
}
