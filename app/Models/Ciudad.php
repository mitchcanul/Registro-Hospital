<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table="ciudades";
    protected $primaryKey="id_ciudad";
    public $timestamps=false;
    public $fillable=[
        'nombre_ciudad'

    ];
}
