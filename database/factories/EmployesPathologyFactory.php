<?php

namespace Database\Factories;
use App\Models\Pathology;
use App\Models\Employes;
use App\Models\EmployesPathology;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployesPathologyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployesPathology::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "pathology_id" => Pathology::all()->random()->id, 
            
            "employes_id" => Employes::all()->random()->id, 
        ];
    }
}
