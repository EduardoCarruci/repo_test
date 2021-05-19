<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medicamento;
class StockFactory extends Factory
{
   
    protected $model = Stock::class;

   
    public function definition()
    {
        return [
            "quantity" => $this->faker->numberBetween(1,200),
            "status" => $this->faker->randomElement(["Activo", "No Activo"]),
            "medicine_id" => Medicamento::all()->random()->id, 
         
        ];
    }
}
