<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'idproductos';

    protected $fillable =[

        'codigo',
        'codigo_principal',
        'codigo_auxiliar',
        'nombre',
        'valor_unitario',
        'tipo_producto',
        'iva',
        'ice',
        'irbpnr',
        'estado',  
        'descripcion',
    ];

}


