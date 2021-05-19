<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'delivery';
    protected $primaryKey = 'id';

    protected $fillable = [
        "description",
        "date",
       
    ];


 //return $this->belongsToMany(Comercio::class, 'comercio_producto', 'producto_id','comercio_id' );
    public function medicines()
    {
        return $this->belongsToMany(Medicamento::class, 'delivery_medicine', 'delivery_id', 'medicine_id');
    }


}
