<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = "id_paciente";
    protected $with=['hospitales','ciudades'];
    public $timestamps = false;

    public $fillable = [
        'id_hospital',
        'id_ciudad',
        'nombres',
        'apellido_p',
        'apellido_m',
        'edad',
        'sexo',
        'fecha_nacimiento',
        'fecha_inscripcion',
        'nombre_tutor',
        'telefono_tutor',
    ];
    public function hospitales(){
        return $this->belongsTo(Hospital::class,'id_hospital','id_hospital');
    }
    public function ciudades(){
        return $this->belongsTo(Ciudad::class,'id_ciudad','id_ciudad');
    }
}
