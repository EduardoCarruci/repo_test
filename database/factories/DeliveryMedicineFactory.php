<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\DeliveryMedicine;
use App\Models\Medicamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryMedicineFactory extends Factory
{
    
    protected $model = DeliveryMedicine::class;

    public function definition()
    {
        return [
            "medicine_id" => Medicamento::all()->random()->id, 
            "delivery_id" => Delivery::all()->random()->id, 
            "quantity" => $this->faker->numberBetween(1,50),
        ];
    }
}
