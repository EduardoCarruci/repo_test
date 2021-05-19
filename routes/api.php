<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyEmployeController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliveryMedicineController;
use App\Http\Controllers\EmployeController;

use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PathologyController;
use App\Http\Controllers\EmployesPathologyController;
use App\Http\Controllers\MedicinePathologyController;
use App\Http\Controllers\StockController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('company', CompanyController::class);
Route::apiResource('employe', EmployeController::class);
Route::apiResource('company.employe', CompanyEmployeController::class);



Route::apiResource('pathology', PathologyController::class);

//Route::apiResource('pathology.employe', EmployesPathologyController::class);
Route::get('/pathology/employe/{pathology}', [EmployesPathologyController::class, 'show'])->name("pathology.employe.show");
Route::post('/pathology/employe/', [EmployesPathologyController::class, 'store'])->name("pathology.employe.store");



Route::apiResource('medicine', MedicamentoController::class);

Route::get('/medicine/pathology/{pathology}', [MedicinePathologyController::class, 'show'])->name("medicine.pathology.show");
Route::post('/medicine/pathology/', [MedicinePathologyController::class, 'store'])->name("medicine.pathology.store");


Route::apiResource('stock', StockController::class);

Route::apiResource('delivery', DeliveryController::class);
Route::get('/delivery/medicine/{delivery}', [DeliveryMedicineController::class, 'show'])->name("delivery.medicine.show");