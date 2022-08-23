@extends('layouts.master')
@section('titulo', 'Pacientes')
@section('contenido')
    <div id="pacientes">
        <span class="btn btn-info float-right" data-toggle="modal" v-on:Click="showModal()"><i>Agregar</i></span>
        <br><br>
        <h5>Lista de pacientes</h5>
        <div class="table-responsive" col-sm-12>

            <table class="table table-hover table-striped">
                <thead>
                    <th>#</th>
                    <th>Nombre del hospital</th>
                    <th>nombre de ciudad</th>
                    <th>nombres</th>
                    <th>apellido paterno</th>
                    <th>apellido materno</th>
                    <th>edad</th>
                    <th>sexo</th>
                    <th>fecha de nacimiento</th>
                    <th>fecha de inscripcion</th>
                    <th>nombre de tutor</th>
                    <th>numero de telefono</th>
                </thead>
                <tbody>
                    <tr v-for="(pacientes,index) in pacientes">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ pacientes.hospitales.nombre_hospital }}</td>
                        <td>@{{ pacientes.ciudades.nombre_ciudad }}</td>
                        <td>@{{ pacientes.nombres }}</td>
                        <td>@{{ pacientes.apellido_p }}</td>
                        <td>@{{ pacientes.apellido_m }}</td>
                        <td>@{{ pacientes.edad }}</td>
                        <td>@{{ pacientes.sexo }}</td>
                        <td>@{{ pacientes.fecha_nacimiento }}</td>
                        <td>@{{ pacientes.fecha_inscripcion }}</td>
                        <td>@{{ pacientes.nombre_tutor }}</td>
                        <td>@{{ pacientes.telefono_tutor }}</td>
                        <td>
                            <span class="btn btn-sm btn-primary" @click="editarPac(pacientes.id_paciente)">Editar</span>
                            <span class="btn btn-sm btn-danger" @click="eliminarPac(pacientes.id_paciente)">eliminar</span>
                            <span class="btn btn-sm btn-success" >Pdf</span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="modal fade" id="add_pacientes" tabindex="-1"  role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if="editar">Editando</h4>
                            <h4 class="modal-title" v-if="!editar">Guardar Nuevo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                v-on:click="Salir()"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                            <form>
                            <div class="col-sm-12">
                                 {{-- prueba hologram --}}
                                <div class="row p-12 mt-4 card-bg1" >
                                            <div class=" col-md-6 col-lg-6 m-b-10 mb-md-0 col-sm-12">
                                                <label>Elegir hospital</label>
                                                        <select class="form-control" v-model="id_hospital" required>
                                                                <option disabled label="Hospital"></option>
                                                                <option v-for="pacientes in hospitales" v-bind:value="pacientes.id_hospital">
                                                                @{{ pacientes.nombre_hospital }}</option>
                                                        </select>
                                                                <br>
                                                    <label>Elegir Ciudad</label>
                                                        <select class="form-control" v-model="id_ciudad" required>
                                                                <option disabled label="Ciudad"></option>
                                                                <option v-for="pacientes in ciudades" v-bind:value="pacientes.id_ciudad">
                                                                @{{ pacientes.nombre_ciudad }}</option>
                                                        </select>
                                                                <br>
                                                    <label>Ingrese su nombre(s)</label>
                                                        <input class="form-control" type="text" v-model="nombres" placeholder="nombres">
                                                    <br>
                                            </div>
                                            <div class=" col-md-12 col-lg-6 m-b-10 mb-md-0 col-sm-12">
                                                    <label>Ingrese apellido paterno</label>
                                                                <input  class="form-control"type="text" v-model="apellido_p" placeholder="Apellido paterno">
                                                    <br>
                                                    <label>Ingrese apellido materno</label>
                                                                <input class="form-control" type="text" v-model="apellido_m" placeholder=" apellido materno">
                                                                <br>
                                                    <label>Ingrese su edad</label>
                                                                <input class="form-control" type="text" v-model="edad" placeholder=" edad">
                                                    <br>
                                            </div>
                                    </div>
                                    {{-- prueba hologram --}}
                                    <div class="row p-3 mt-4 card-bg1" >
                                        <div class=" col-md-6 col-lg-6 m-b-10 mb-md-0 col-sm-12">
                                                <label class="form-control" for="sexo">Selecciona el valor de genero:</label>
                                                                <select class="form-control" v-model="sexo" required="required">
                                                                    <option class="form-control" value="Masculino">Masculino</option>
                                                                    <option class="form-control" value="Femenino">Femenino</option>
                                                                </select>


                                                            <br>
                                                <label>Ingrese fecha de nacimiento</label>
                                                                <input class="form-control" type="date" v-model="fecha_nacimiento" placeholder=" fecha de nacimiento">
                                                                <br>
                                                <label>Ingrese fecha de inscripcion</label>
                                                                <input class="form-control" type="date" v-model="fecha_inscripcion" placeholder=" fecha de inscripcion">
                                                                <br>
                                        </div>
                                        <div class=" col-md-6 col-lg-6 m-b-10 mb-md-0 col-sm-12">
                                                <label>Ingrese nombre de tutor</label>
                                                                <input class="form-control" type="text" v-model="nombre_tutor" placeholder="nombre de tutor">
                                                                <br>
                                                <label>Ingrese numero de telefono</label>
                                                                <input class="form-control" type="text" v-model="telefono_tutor" placeholder="numero de telefono">
                                        </div>
                                    </div>{{-- hologram --}}
                            </div>

                            </form>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success"v-on:click="actualizarPac" v-if="editar">Editar</button>
                            <button type="submit" v-on:click="agregarPac" class="btn btn-primary"
                                v-if="!editar">Guardar</button>
                            <button type="submit" class="btn btn-danger" @click="Salir()">Cancelar</button>


                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="js/paciente.js"></script>

    <script>
        function s() {
            let femeninos, masculinos;
            sexo = parseInt(document.pacientes.sexo.value);
            if (sexo == 1)
                masculinos = masculinos + 1;
            else
                femeninos = femeninos + 1;
        }
    </script>

@endpush

<input type="hidden" name="route" value="{{ url('/') }}">




