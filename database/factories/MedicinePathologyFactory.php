<?php

namespace Database\Factories;

use App\Models\MedicinePathology;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Medicamento;
use App\Models\Pathology;
class MedicinePathologyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicinePathology::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "medicine_id" => Medicamento::all()->random()->id, 
            
            "pathology_id" => Pathology::all()->random()->id, 
        ];
    }
}
