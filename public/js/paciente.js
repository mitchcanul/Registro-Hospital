function init() {
    var $route = document.querySelector("[name=route]").value;
    var UrlPacientes = "http://localhost/Registro-Hospital/public/apip";
    var UrlHospital = "http://localhost/Registro-Hospital/public/apih";
    var UrlCiudad = "http://localhost/Registro-Hospital/public/apic";

    new Vue({
        http: {
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector("#token")
                    .getAttribute("value"),
            },
        },

        el: "#pacientes",

        data: {
            pacientes: [],
            hospitales: [],
            ciudades: [],
            nom: "hola",
            id_paciente: "",
            id_hospital: "",
            id_ciudad: "",
            nombres: "",
            apellido_p: "",
            apellido_m: "",
            edad: "",
            sexo: "",
            fecha_nacimiento: "",
            fecha_inscripcion: "",
            nombre_tutor: "",
            telefono_tutor: "",
            id_auxi: "",
            editar: false,
        },
        created: function () {
            this.getPacientes();
            this.getHospital();
            this.getCiudad();
        },

        methods: {
            getPacientes: function () {
                this.$http.get(UrlPacientes).then(function (json) {
                    this.pacientes = json.data;
                });
            },
            getHospital: function () {
                this.$http.get(UrlHospital).then(function (json) {
                    this.hospitales = json.data;
                });
            },
            getCiudad: function () {
                this.$http.get(UrlCiudad).then(function (json) {
                    this.ciudades = json.data;
                });
            },
            showModal: function () {
                $("#add_pacientes").modal("show");
            },
            Salir: function () {
                this.editar = false;
                this.id_hospital = "";
                this.id_ciudad = "";
                this.nombres = "";
                this.apellido_p = "";
                this.apellido_m = "";
                this.edad = "";
                this.sexo = "";
                this.fecha_nacimiento = "";
                this.fecha_inscripcion = "";
                this.nombre_tutor = "";
                this.telefono_tutor = "";
                $("#add_pacientes").modal("hide");
            },

            agregarPac: function () {
                var pacie = {
                    id_hospital: this.id_hospital,
                    id_ciudad: this.id_ciudad,
                    nombres: this.nombres,
                    apellido_p: this.apellido_p,
                    apellido_m: this.apellido_m,
                    edad: this.edad,
                    sexo: this.sexo,
                    fecha_inscripcion: this.fecha_inscripcion,
                    fecha_nacimiento: this.fecha_nacimiento,
                    nombre_tutor: this.nombre_tutor,
                    telefono_tutor: this.telefono_tutor,
                };
                this.$http.post(UrlPacientes, pacie).then(function (json) {
                    this.getPacientes();
                    this.Salir();
                });
            },
            editarPac: function (id) {
                this.editar = true;
                this.$http.get(UrlPacientes + "/" + id).then(function (json) {
                    this.id_hospital = json.data.id_hospital;
                    this.id_ciudad = json.data.id_ciudad;
                    this.nombres = json.data.nombres;
                    this.apellido_p = json.data.apellido_p;
                    this.apellido_m = json.data.apellido_m;
                    this.edad = json.data.edad;
                    this.sexo = json.data.sexo;
                    this.fecha_nacimiento = json.data.fecha_nacimiento;
                    this.fecha_inscripcion = json.data.fecha_inscripcion;
                    this.nombre_tutor = json.data.nombre_tutor;
                    this.telefono_tutor = json.data.telefono_tutor;
                    this.id_auxi = json.data.id_paciente;
                    $("#add_pacientes").modal("show");
                });
            },
            actualizarPac: function () {
                var pa = {
                    id_hospital: this.id_hospital,
                    id_ciudad: this.id_ciudad,
                    nombres: this.nombres,
                    apellido_p: this.apellido_p,
                    apellido_m: this.apellido_m,
                    edad: this.edad,
                    sexo: this.sexo,
                    fecha_nacimiento: this.fecha_nacimiento,
                    fecha_inscripcion: this.fecha_inscripcion,
                    nombre_tutor: this.nombre_tutor,
                    telefono_tutor: this.telefono_tutor,
                };
                this.$http
                    .patch(UrlPacientes + "/" + this.id_auxi, pa)
                    .then(function (json) {
                        this.getPacientes();
                        this.Salir();
                    });
            },
            eliminarPac: function (id) {
                var pac = confirm("Esta seguro de eliminar el paciente?");
                if (pac == true)
                    this.$http
                        .delete(UrlPacientes + "/" + id)
                        .then(function (json) {
                            this.getPacientes();
                        });
            },
        },
    });
}
window.onload = init;
