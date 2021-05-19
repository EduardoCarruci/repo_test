<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMedicamentoPathologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_pathology', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pathology_id")->nullable();
            $table->unsignedBigInteger("medicine_id")->nullable();

            $table->foreign('pathology_id')->references('id')->on('pathology');
            $table->foreign('medicine_id')->references('id')->on('medicine');
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
        Schema::dropIfExists('medicine_pathology');
    }
}
