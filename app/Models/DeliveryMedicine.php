<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMedicine extends Model
{
    use HasFactory;

    protected $table = 'delivery_medicine';
    protected $primaryKey = 'id'; 
    protected $fillable = ["delivery_id", "medicine_id"];
    
}
