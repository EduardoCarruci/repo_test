<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employes;
use App\Models\Pathology;
use App\Models\EmployesPathology;


class EmployesPathologyController extends Controller
{

    public function show($pathology)
    {
        $pathology = Pathology::find($pathology);

        if (!$pathology) {
            return response()->json(["mensaje" => "No existe la patologia", "codigo" => 404], 404);
        }

        $pathology = $pathology->employes;


        return response()->json(["datos" => $pathology], 200);
    }




    public function store(Request $request)
    {
        if (
            !$request->get("pathology_id")
            || !$request->get("employes_id")


        ) {

            return response()->json([
                "res" => false,
                "message" => "Datos Invalidos o Incompletos",
            ], 404);
        }

        EmployesPathology::create([
            "pathology_id" => $request->get("pathology_id"),
            "employes_id" => $request->get("employes_id"),
        ]);

        return response()->json([
            "res" => true,
            "message" => "Empleado y unido a la patologia creado",
        ], 200);
    }

    
}
