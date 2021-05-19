<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Pathology;

class Employes extends Model
{
    use HasFactory;

    protected $table = 'employes';
    protected $primaryKey = 'id';
    protected $hidden = ["created_at", "updated_at"];
    protected $fillable = ["company_id", "status", "first_name", "last_name", "ci"];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function pathologys()
    {
        return $this->belongsToMany(Pathology::class, 'employe_pathology', 'employes_id', 'pathology_id');
    }
}
