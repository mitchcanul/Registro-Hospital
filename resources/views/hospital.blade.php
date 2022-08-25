@extends('layouts.master')
@section('titulo', 'Pacientes')
@section('contenido')
    <div id="hospitales">
        <div class="container-sm">
            <h5 class="text-center">Lista de Hospitales</h5>
        <span class="btn btn-outline-primary float-left" data-toggle="modal" v-on:Click="showModal()"><i >Agregar</i></span>
        <br><br>

        <div class="table-responsive" col-sm-12>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>#</th>
                    <th>Nombre del hospital</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <tr v-for="(hospitales,index) in hospitales">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ hospitales.nombre_hospital }}</td>
                        <td>
                            <span class="btn btn-sm btn-primary" @click="editarH(hospitales.id_hospital)"><i class="fa fa-edit"></i></span>
                            <span class="btn btn-sm btn-danger" @click="eliminarH(hospitales.id_hospital)"><i class="fa fa-trash"></i></span>
                        </td>
                    </tr>
                </tbody>
            </table>

        <div class="modal fade" id="add_hospitales" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-if="editar">Editando</h4>
                        <h4 class="modal-title" v-if="!editar">Guardar Nuevo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            v-on:click="Salir()"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label>Ingrese un nuevo hospital</label>
                            <input class="form-control" type="text" v-model="nombre_hospital" placeholder="nombre del hospital">
                            <br>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" v-on:click="actualizarH" class="btn btn-success" v-if="editar">Editar</button>
                        <button type="submit" v-on:click="agregarH" class="btn btn-primary"  v-if="!editar">Guardar</button>
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
    <script src="js/hospital.js"></script>
@endpush

<input type="hidden" name="route" value="{{ url('/') }}">

