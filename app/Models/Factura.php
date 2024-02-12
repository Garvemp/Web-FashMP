<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'Fecha_venta',
        // Otros atributos aquí
        'cedula_cliente',
        'id_producto',
        'Unidades',
        'Metodo_pago',
    ];
}
