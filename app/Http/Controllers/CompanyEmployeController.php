<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employes;
use Illuminate\Http\Request;

class CompanyEmployeController extends Controller
{
    //

    public function index($id)
    {
        $companies = Company::find($id);

        $empleados = $companies->employe;

        if (!$companies) {
            return response()->json(["mensaje" => "No existe la empresa", "codigo" => 404], 404);
        }



        return response()->json(["datos" => $empleados], 200);
    }

    public function store(Request $request, $id)
    {
        if (
            !$request->get("ci")
            || !$request->get("first_name")
            || !$request->get("last_name")
            || !$request->get("status")
        ) {

            return response()->json([
                "res" => false,
                "message" => "Datos Invalidos o Incompletos",
            ], 404);
        }


        $company = Company::find($id);

        if (!$company) {
            return response()->json([
                "res" => false,
                "message" => "Empresa no existe",
            ], 404);
        }
        //se crea el empleado
        Employes::create([
            "first_name" => $request->get("first_name"),
            "last_name" => $request->get("last_name"),
            "ci" => $request->get("ci"),
            "status" => $request->get("status"),
            "company_id" => $id
        ]);


        return response()->json([
            "res" => true,
            "message" => "Empleado creado",
        ], 200);
    }


    public function update(Request $request, $idCompany, $idEmployee)
    {
        //method 
        $metodo = $request->method();
        $company = Company::find($idCompany);

        if (!$company) {
            return response()->json(["mensaje" => "Empresa no existe"], 404);
        }

        $employe = $company->employe()->find($idEmployee);

        if (!$employe) {
            return response()->json(["mensaje" => "Empleado no existe"], 404);
        }

        //datos del empleado  
        $ci = $request->get("ci");
        $first_name = $request->get("first_name");
        $last_name = $request->get("last_name");
        $status = $request->get("status");


        if ($metodo  ===  "PATCH") {
            if ($ci != null && $ci != "") {
                $employe->ci = $ci;
            }
            if ($first_name != null && $first_name != "") {
                $employe->first_name = $first_name;
            }

            if ($last_name != null && $last_name != "") {
                $employe->last_name = $last_name;
            }

            if ($status != null && $status != "") {
                $employe->status = $status;
            }
            $employe->save();
            return response()->json(["mensaje" => "Empleado editado exitosamente"], 200);
        }


        if (!$ci || !$first_name || !$last_name || !$status) {
            return response()->json(["mensaje" => "Datos Invalidos"], 404);
        }
        $employe->status = $status;
        $employe->last_name = $last_name;
        $employe->first_name = $first_name;
        $employe->ci = $ci;
        $employe->save();
        return response()->json(["mensaje" => "Empleado editado exitosamente"], 200);
    }
}
