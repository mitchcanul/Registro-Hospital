@extends('layouts.master')
@section('titulo', 'Ciudad')
@section('contenido')
    <div id="ciudades">
        <div class="container-sm">
            <h5 class="text-center">Lista de Ciudades que cuentan con hospital</h5>
        <span class="btn btn-outline-primary float-left" data-toggle="modal" v-on:Click="showModal()"><i >Agregar</i></span>
        <br><br>

        <div class="table-responsive" col-sm-12>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>#</th>
                    <th>Lugares</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <tr v-for="(ciudades,index) in ciudades">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{ ciudades.nombre_ciudad }}</td>
                        <td>
                            <span class="btn btn-sm btn-primary" @click="editarC(ciudades.id_ciudad)"><i class="fa fa-edit"></i></span>
                            <span class="btn btn-sm btn-danger" @click="eliminarC(ciudades.id_ciudad)"><i class="fa fa-trash"></i></span>
                        </td>

                    </tr>
                </tbody>
            </table>

        <div class="modal fade" id="add_ciudades" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-if="editar">Editando</h4>
                        <h4 class="modal-title" v-if="!editar">Guardar Nuevo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            v-on:click="Salir()"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label>Ingrese una nueva ciudad que cuente con hospital</label>
                            <input class="form-control" type="text" v-model="nombre_ciudad" placeholder="nombre de la ciudad">
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" v-on:click="actualizarC" class="btn btn-success" v-if="editar">Editar</button>
                        <button type="submit" v-on:click="agregarC" class="btn btn-primary"  v-if="!editar">Guardar</button>
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
    <script src="js/ciudad.js"></script>
@endpush

<input type="hidden" name="route" value="{{ url('/') }}">

