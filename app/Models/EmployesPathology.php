<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pathology;
use App\Models\Employes;
class EmployesPathology extends Model
{
    use HasFactory;
    protected $table = 'employe_pathology';
    protected $primaryKey = 'id';
    protected $fillable = ["pathology_id", "employes_id"];
    

    public function pathology(){

        return $this->belongsTo(Pathology::class,  'pathology_id');
    }
    public function employe(){

        return $this->belongsTo(Employes::class,  'employes_id');
    }



}
