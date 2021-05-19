<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicamento;

class MedicamentoController extends Controller
{

    public function index()
    {

        $items = Medicamento::all();

        //$items = $items->stock;

        return response()->json(["medicamentos" => $items], 200);
    }


    public function store(Request $request)
    {


        //COMPLETE 
        if (
            !$request->get("name")
            || !$request->get("name_chemistry")
            || !$request->get("date_expire")
            || !$request->get("date_expedition")
            || !$request->get("presentation")
        ) {

            return response()->json([
                "res" => false,
                "message" => "Datos Invalidos o Incompletos",
            ], 404);
        }

        $data = $request->all();

        Medicamento::create($data);

        return response()->json([
            "res" => true,
            "message" => "Medicamento registrado",

        ], 200);
    }


    public function show($id)
    {

        $item = Medicamento::find($id);
        if (!$item) {
            return response()->json(["mensaje" => "No existe el medicamento"], 404);
        }
        return response()->json(["medicamento" => $item], 200);
    }

    public function update(Request $request, $id)
    {
        $item = Medicamento::find($id);

        $name = $request->get("name");
        $name_chemistry = $request->get("name_chemistry");
        $date_expire = $request->get("date_expire");
        $date_expedition = $request->get("date_expedition");
        $presentation = $request->get("presentation");
        if (
            !$name  ||
            !$name_chemistry ||
            !$date_expire || !$date_expedition
            || !$presentation
        ) {
            return response()->json(["mensaje" => "Datos Invalidos"], 404);
        }
        $item->name = $name;
        $item->name_chemistry = $name_chemistry;
        $item->date_expire = $date_expire;
        $item->date_expedition = $date_expedition;
        $item->presentation = $presentation;

        $item->save();
        return response()->json(["mensaje" => "Medicamento editada exitosamente"], 200);
    }


    public function destroy($id)
    {

        Medicamento::destroy($id);
        return response()->json(["mensaje" => "Medicamento eliminado exitosamente"], 200);
    
    
    }
}
