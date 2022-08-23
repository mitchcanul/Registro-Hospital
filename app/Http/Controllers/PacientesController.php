<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $pacientes = Paciente::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        //
        $pacientes = new Paciente;
        $pacientes->id_hospital = $request->get('id_hospital');
        $pacientes->id_ciudad = $request->get('id_ciudad');
        $pacientes->nombres = $request->get('nombres');
        $pacientes->apellido_p = $request->get('apellido_p');
        $pacientes->apellido_m = $request->get('apellido_m');
        $pacientes->edad = $request->get('edad');
        $pacientes->sexo = $request->get('sexo');
        $pacientes->fecha_nacimiento = $request->get('fecha_nacimiento');
        $pacientes->fecha_inscripcion = $request->get('fecha_inscripcion');
        $pacientes->nombre_tutor = $request->get('nombre_tutor');
        $pacientes->telefono_tutor = $request->get('telefono_tutor');

        $pacientes->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $pacientes = Paciente::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pacientes=Paciente::find($id);
        $pacientes->id_hospital=$request->get('id_hospital');
        $pacientes->id_ciudad = $request->get('id_ciudad');
        $pacientes->nombres = $request->get('nombres');
        $pacientes->apellido_p = $request->get('apellido_p');
        $pacientes->apellido_m = $request->get('apellido_m');
        $pacientes->edad = $request->get('edad');
        $pacientes->sexo = $request->get('sexo');
        $pacientes->fecha_nacimiento = $request->get('fecha_nacimiento');
        $pacientes->fecha_inscripcion = $request->get('fecha_inscripcion');
        $pacientes->nombre_tutor = $request->get('nombre_tutor');
        $pacientes->telefono_tutor = $request->get('telefono_tutor');
        $pacientes->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $pacientes=Paciente::destroy($id);
    }
}
