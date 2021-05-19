<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryMedicineController extends Controller
{
   
 
    public function show($id)
    {
        $item = Delivery::find($id);

        if (!$item) {
            return response()->json(["mensaje" => "No existe ese delivery registrado", "codigo" => 404], 404);
        }

        $item = $item->medicines;
        return response()->json(["items" => $item], 200);

    }

}
