<?php

namespace Database\Factories;

use App\Models\Medicamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicamentoFactory extends Factory
{
   
    protected $model = Medicamento::class;

    public function definition()
    {


        return [
       
            "name" => $this->faker->unique()->name(),
            "name_chemistry" => $this->faker->unique()->name(),
            "date_expire" => $this->faker->date(),
            "date_expedition" => $this->faker->date(),
            "presentation" => $this->faker->paragraph(),
         

        ];
    }
}
