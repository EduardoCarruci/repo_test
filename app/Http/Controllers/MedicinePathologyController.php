<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pathology;
use App\Models\MedicinePathology;
class MedicinePathologyController extends Controller
{
   
    public function show($pathology)
    {
        $items = Pathology::find($pathology);

        if (!$items) {
            return response()->json(["mensaje" => "No existe la patologia", "codigo" => 404], 404);
        }

        $items = $items->medicines;


        return response()->json(["medicinas" => $items], 200); 
    }




    public function store(Request $request)
    {
         if (
            !$request->get("pathology_id")
            || !$request->get("medicine_id")


        ) {

            return response()->json([
                "res" => false,
                "message" => "Datos Invalidos o Incompletos",
            ], 404);
        }

        MedicinePathology::create([
            "pathology_id" => $request->get("pathology_id"),
            "medicine_id" => $request->get("medicine_id"),
        ]);

        return response()->json([
            "res" => true,
            "message" => "Medicamento unido a la patologia.",
        ], 200); 
    }

    
}
