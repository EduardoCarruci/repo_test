<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEmployesPathologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_pathology', function (Blueprint $table) {
            $table->id();
         
            $table->unsignedBigInteger("pathology_id")->nullable();
            $table->unsignedBigInteger("employes_id")->nullable();

            $table->foreign('pathology_id')->references('id')->on('pathology');
            $table->foreign('employes_id')->references('id')->on('employes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe_pathology');
    }
}
