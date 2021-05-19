<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employes;
class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    protected $primaryKey = 'id'; 
    protected $hidden= ["created_at","updated_at"];
    protected $fillable = ["name"];

    public function employe()
    {
        return $this->hasMany(Employes::class);
    }
}
