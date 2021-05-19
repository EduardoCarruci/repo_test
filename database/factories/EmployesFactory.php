<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Employes;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employes::class;

    public function definition()
    {
        //$nombre = $this->faker->unique()->company(20);
        $ci = $this->faker->unique()->creditCardNumber();

        return [

            "ci" => $ci,
            "first_name" => $this->faker->unique()->firstNameMale(),
            "last_name" => $this->faker->unique()->lastName(),
            "status" => $this->faker->randomElement(["Activo", "No Activo"]),
            "company_id" => Company::all()->random()->id, 
         
        ];
    }

}
