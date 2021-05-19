<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stock;
use App\Models\Medicamento;

class StockController extends Controller
{

    public function index()
    {
        $item = Stock::all();

        return response()->json(["items" => $item], 200);
    }


    public function store(Request $request)
    {


        $medicine_id = $request->get("medicine_id");
        $medicine = Medicamento::find($medicine_id);
        if (!$medicine) {
            return response()->json(["mensaje" => "No existe el medicamento"], 404);
        }

        if (
            !$request->get("quantity") &&
            !$request->get("status")

        ) {
            return response()->json([
                "res" => false,
                "message" => "Datos Invalidos o Incompletos",
            ], 404);
        }
        $data = $request->all();
        Stock::create($data);
        return response()->json([
            "res" => true,
            "message" => "Stock registrado",

        ], 200);
    }


    public function show($id)
    {
        $item = Stock::find($id);
        if (!$item) {
            return response()->json(["mensaje" => "No existe ese stock"], 404);
        }
        return response()->json(["item" => $item], 200);
    }


    public function update(Request $request, $id)
    {

        $item = Stock::find($id);
        $quantity = $request->get("quantity");
        $status = $request->get("status");
        $medicine_id = $request->get("medicine_id");

        if (!$quantity) {
            return response()->json(["mensaje" => "Cantidad invalida"], 404);
        }

        if (!$status) {
            return response()->json(["mensaje" => "Estatus invalida"], 404);
        }

        $medicine = Medicamento::find($medicine_id);
        if (!$medicine) {
            return response()->json(["mensaje" => "No existe el medicamento"], 404);
        }
        $item->quantity = $quantity;
        $item->status = $status;
        $item->medicine_id = $medicine_id;

        $item->save();
        return response()->json(["mensaje" => "Stock editado exitosamente"], 200);
    }


    public function destroy($id)
    {
        Stock::destroy($id);
        return response()->json(["mensaje" => "Stock eliminado exitosamente"], 200);
    }
}
