<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employes;
use App\Models\Medicamento;
/* use App\Models\Medicamento; */

class Pathology extends Model
{
    use HasFactory;

    protected $table = 'pathology';
    protected $primaryKey = 'id';
    protected $fillable = ["name",];

    public function employes()
    {
        return $this->belongsToMany(Employes::class, 'employe_pathology', 'pathology_id', 'employes_id');
    }


    // EL ORDEN DE ESTA LISTA INFLUYE EDUARDO.
    public function medicines()
    {
        return $this->belongsToMany(Medicamento::class, 'medicine_pathology', 'pathology_id', 'medicine_id');
    }




}
