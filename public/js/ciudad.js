function init() {
    var $route = document.querySelector("[name=route]").value;
    var UrlCiudad = "http://localhost/Registro-Hospital/public/apic";

    new Vue({
        http: {
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector("#token")
                    .getAttribute("value"),
            },
        },

        el: "#ciudades",

        data: {
            ciudades: [],
            nom: "hola",
            nombre_ciudad: "",
            id_auxi: "",
            editar: false,
        },
        created: function () {
            this.getCiudad();
        },

        methods: {
            getCiudad: function () {
                this.$http.get(UrlCiudad)
                .then(function(json){
                    this.ciudades = json.data;
                });
            },
            showModal: function () {
                $("#add_ciudades").modal("show");
            },
            Salir: function () {
                this.editar = false;
                this.nombre_ciudad = "";
                $("#add_ciudades").modal("hide");
            },

            agregarC: function () {
                var c = {
                    nombre_ciudad:this.nombre_ciudad,
                };
                this.$http.post(UrlCiudad, c)
                .then(function(json) {
                    this.getCiudad();
                    this.Salir();
                });
            },
            editarC: function (id) {
                this.editar = true;
                this.$http.get(UrlCiudad + "/" + id)
                .then(function (json) {
                    this.nombre_ciudad = json.data.nombre_ciudad;
                    this.id_auxi = json.data.id_ciudad;
                    $("#add_ciudades").modal("show");
                });
            },
            actualizarC: function () {
                var ci = {
                    nombre_ciudad: this.nombre_ciudad,
                };
                this.$http.patch(UrlCiudad + "/" + this.id_auxi, ci)
                    .then(function (json) {
                        this.getCiudad();
                        this.Salir();
                    });
            },
            eliminarC: function (id) {
                Swal.fire({
                    title: "La ciudad será eliminado",
                    text: "Está seguro de eliminar la ciudad?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar",
                    dangerMode: true,
                }).then((resultado) => {
                    if (resultado.value) {
                        this.$http
                            .delete(UrlCiudad + "/" + id)
                            .then(function (json) {
                                this.getCiudad();
                            });
                        Swal.fire("La ciudad fue eliminada exitosamente", {
                            icon: "success",
                        });
                    } else {
                        Swal.fire("La ciudad no se pudo eliminar");
                    }
                });
            },
        },
    });
}
window.onload = init;
