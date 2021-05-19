<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeMigration extends Migration
{
   
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string("ci")->unique();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("status")->nullable();
            $table->unsignedBigInteger("company_id")->nullable();
          
            $table->foreign("company_id")->references("id")
            ->on("company")
            ->onDelete("set null");

            $table->timestamps();
           


           
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
