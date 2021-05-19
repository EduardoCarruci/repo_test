<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pathology;

use App\Models\Stock;


class Medicamento extends Model
{
    use HasFactory;


    protected $table = 'medicine';
    protected $primaryKey = 'id';

    protected $fillable = [
        "name",
        "name_chemistry",
        "date_expire",
        "date_expedition",
        "presentation",
    ];

    public function pathologys()
    {
        return $this->belongsToMany(Pathology::class, 'medicine_pathology', 'medicine_id', 'pathology_id');
    }
    //return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
    public function stock()
    {
        return $this->hasOne(Stock::class);
    }


    //return $this->belongsToMany(Comercio::class, 'comercio_producto', 'producto_id','comercio_id' );
    public function deliverys()
    {
        return $this->belongsToMany(Delivery::class, 'delivery_medicine', 'medicine_id', 'delivery_id');
    }
}
