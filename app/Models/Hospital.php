<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table="hospitales";
    protected $primaryKey="id_hospital";
    public $timestamps=false;
    public $fillable=[
        'nombre_hospital'

    ];

}
