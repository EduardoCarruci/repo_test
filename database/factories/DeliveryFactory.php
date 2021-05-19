<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    
    protected $model = Delivery::class;

    public function definition()
    {
        return [
          
            "description" => $this->faker->unique()->paragraph(),
            "date" => $this->faker->date(),
         
        ];
    }
}
