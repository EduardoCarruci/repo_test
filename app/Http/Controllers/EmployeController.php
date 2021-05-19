<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    //
/*     public function __construct()
    {
        $this->middleware("auth.basic");
    } */

    public function index()
    {
        $employe = Employes::all();
        if (!$employe) {
            return response()->json(["mensaje" => "No existen empleados"], 404);
        }
        return response()->json(["empleado" => $employe], 200);
    }

    public function show($id)
    {

        $employe = Employes::find($id);
        if (!$employe) {
            return response()->json(["mensaje" => "No existe el empleado"], 404);
        }
        return response()->json(["empleado" => $employe], 200);
    }

//
    public function destroy($id)
    {

        Employes::destroy($id);
        return response()->json(["mensaje" => "Empleado eliminado exitosamente"], 200);
    }
    
}
