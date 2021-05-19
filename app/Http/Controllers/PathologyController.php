<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pathology;

class PathologyController extends Controller
{
    
    public function index()
    {
        $item = Pathology::all();

        return response()->json(["items" => $item], 200);
    }

    public function store(Request $request)
    {
        
        //COMPLETE 
        if (
            !$request->get("name")
          
        ) {

            return response()->json([
                "res" => false,
                "message" => "Datos Invalidos o Incompletos",
            ], 404);
        }

        $data = $request->all();

        Pathology::create($data);

        return response()->json([
            "res" => true,
            "message" => "Patologia registrado",

        ], 200);
    }

   
    public function show($id)
    {
        $item = Pathology::find($id);
        if (!$item) {
            return response()->json(["mensaje" => "No existe la patologia"], 404);
        }
        return response()->json(["patologia" => $item], 200);

    }
    public function update(Request $request, $id)
    {
       
        $item = Pathology::find($id);

        $name = $request->get("name");
        if (!$name) {
            return response()->json(["mensaje" => "Datos Invalidos"], 404);
        }
        $item->name = $name;
        $item->save();
        return response()->json(["mensaje" => "Patologia editada exitosamente"], 200);

    }

 
    public function destroy($id)
    {

        Pathology::destroy($id);
        return response()->json(["mensaje" => "Patologia eliminado exitosamente"], 200);
    }
}
