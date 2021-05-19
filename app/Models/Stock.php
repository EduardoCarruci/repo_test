<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicamento;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $primaryKey = 'id'; 
    protected $fillable = ["status","quantity","medicine_id"];
    
    public function medicine()
    {
        return $this->belongsTo(Medicamento::class);
    }

    
}
