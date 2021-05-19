<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    
    protected $model = Company::class;

    
    public function definition()
    {
        $name = $this->faker->unique()->company(20);
        return [
            "name" => $name,
          
        ];
    }
}
