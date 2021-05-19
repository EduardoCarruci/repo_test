<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
   
    public function index()
    {

        $companies = Company::all();

        return response()->json(["empresas" => $companies], 200);
    }

    public function show($id)
    {

        $compani = Company::find($id);
        if (!$compani) {
            return response()->json(["mensaje" => "No existe la empresa"], 404);
        }
        return response()->json(["empresa" => $compani], 200);
    }
    public function store(Request $res)
    {

        if (!$res->get("name")) {

            return response()->json([
                "res" => false,
                "data" => $res->all(),
                "message" => "Datos Invalidos o Incompletos",
            ], 404);
        }

        $data = $res->all();

        Company::create($data);
        

        return response()->json([
            "res" => true,
            "message" => "Registro creado de la compañia",

        ], 200);
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        //method 
        $metodo = $request->method();

        if ($metodo  ===  "PATCH") {

            $name = $request->get("name");
            if ($name != null && $name != "") {
                $company->name = $name;
            }
            $company->save();
            return response()->json(["mensaje" => "Empresa editada exitosamente"], 200);
        }
        $name = $request->get("name");
        if (!$name) {
            return response()->json(["mensaje" => "Datos Invalidos"], 404);
        }
        $company->name = $name;
        $company->save();
        return response()->json(["mensaje" => "Empresa editada exitosamente"], 200);
    
    }
}
