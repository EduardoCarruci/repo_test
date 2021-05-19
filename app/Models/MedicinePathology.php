<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicinePathology extends Model
{
    use HasFactory;
    protected $table = 'medicine_pathology';
    protected $primaryKey = 'id'; 

    protected $fillable = ["pathology_id", "medicine_id"];
    

    /* public function pathology(){

        return $this->belongsTo(Pathology::class,  'pathology_id');
    }
    public function medicine(){

        return $this->belongsTo(Medicamento::class,  'employes_id');
    } */


    
}
