<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Delivery;
use App\Models\DeliveryMedicine;
use App\Models\Employes;
use App\Models\Medicamento;
use App\Models\Pathology;
use App\Models\Stock;
use App\Models\EmployesPathology;
use App\Models\MedicinePathology;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //mis seeders

        //company
        Company::factory(20)->create();
        //employe
        Employes::factory(50)->create();
        //Pathology::factory(5)->create();

        DB::table('pathology')->insert([
            'name' => 'Covid-19',

        ]);
        DB::table('pathology')->insert([
            'name' => 'Neuralgia',

        ]);
        DB::table('pathology')->insert([
            'name' => 'Sida',

        ]);

        DB::table('medicine')->insert([
            "name"            => "Parsel",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);


        DB::table('medicine')->insert([
            "name"            => "Acetominofen",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);

        DB::table('medicine')->insert([
            "name"            => "Migren",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);

        DB::table('medicine')->insert([
            "name"            => "Dobet",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);

        DB::table('medicine')->insert([
            "name"            => "Alfadyn",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);


        DB::table('medicine')->insert([
            "name"            => "Protector gastrico",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);

        DB::table('medicine')->insert([
            "name"            => "Omeprazol",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);
        DB::table('medicine')->insert([
            "name"            => "Fluconazol",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);

        DB::table('medicine')->insert([
            "name"            => "Esomeprazol",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);


        DB::table('medicine')->insert([
            "name"            => "Flemibar",
            "name_chemistry"  => "P1",
            "date_expire"     => "2021-02-27",
            "date_expedition"     => "2021-02-27",
            "presentation" => "Sin descripcion alguna"
        ]);




        //Medicamento::factory(250)->create();
        Stock::factory(5)->create();

        EmployesPathology::factory(50)->create();

        MedicinePathology::factory(5)->create();



        User::factory(10)->create();

        Delivery::factory(25)->create();
        DeliveryMedicine::factory(10)->create();

    }
}
