<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suministro extends Model
{
    use HasFactory;
    protected $fillable = [
        'Fecha_venta',
        'cedula_proveedor',
        'id_producto',
        'Unidades',
        'Metodo_pago',
    ];
}
