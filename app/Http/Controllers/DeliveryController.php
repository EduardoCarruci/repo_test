<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    //

    public function index()
    {
        $items = Delivery::all();
        if (!$items) {
            return response()->json(["mensaje" => "No existen entregas"], 404);
        }
        return response()->json(["items" => $items], 200);
    }


    public function store(Request $request)
    {

        if (
            !$request->get("date") &&
            !$request->get("description")

        ) {
            return response()->json([
                "res" => false,
                "message" => "Datos Invalidos o Incompletos",
            ], 404);
        }
        $data = $request->all();
        Delivery::create($data);
        return response()->json([
            "res" => true,
            "message" => "Delivery registrado",

        ], 200);
    }
    public function show($id)
    {
        $item = Delivery::find($id);
        if (!$item) {
            return response()->json(["mensaje" => "No existe ese delivery"], 404);
        }
        return response()->json(["item" => $item], 200);
    }
    public function update(Request $request, $id)
    {

        $item = Delivery::find($id);
        $date = $request->get("date");
        $description = $request->get("description");
        if (!$description) {
            return response()->json(["mensaje" => "Descripcion invalida"], 404);
        }

        if (!$date) {
            return response()->json(["mensaje" => "Fecha invalida"], 404);
        }

        $item->date = $date;
        $item->description = $description;


        $item->save();
        return response()->json(["mensaje" => "Delivery editado exitosamente"], 200);
    }


    public function destroy($id)
    {
        Delivery::destroy($id);
        return response()->json(["mensaje" => "Delivery eliminado exitosamente"], 200);
    }
}
