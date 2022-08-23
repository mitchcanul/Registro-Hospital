function init() {
    var $route = document.querySelector("[name=route]").value;
    var UrlHospital = "http://localhost/Registro-Hospital/public/apih";

    new Vue({
        http: {
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector("#token")
                    .getAttribute("value"),
            },
        },

        el: "#hospitales",

        data: {
            hospitales: [],
            nom: "hola",
            nombre_hospital:"",
            id_auxi:"",
            editar:false,
        },
        created:function() {
            this.getHospital();
        },

        methods: {
            getHospital:function() {
                this.$http.get(UrlHospital)
                .then(function(json){
                    this.hospitales=json.data;
                });
            },
            showModal: function () {
                $('#add_hospitales').modal('show');
            },
            Salir: function () {
                this.editar = false;
                this.nombre_hospital = "";
                $('#add_hospitales').modal('hide');
            },

            agregarH: function () {
                var hospi = {
                    nombre_hospital:this.nombre_hospital,
                };
                this.$http.post(UrlHospital, hospi)
                .then(function(json) {
                    this.getHospital();
                    this.Salir();
                });
            },
            editarH: function (id) {
                this.editar = true;
                this.$http.get(UrlHospital + "/" + id)
                .then(function (json) {
                    this.nombre_hospital = json.data.nombre_hospital;
                    this.id_auxi = json.data.id_hospital;
                    $('#add_hospitales').modal('show');
                });
            },
            actualizarH: function () {
                var ho = {
                    nombre_hospital: this.nombre_hospital,
                };
                this.$http
                    .patch(UrlHospital + "/" + this.id_auxi, ho)
                    .then(function (json) {
                        this.getHospital();
                        this.Salir();
                    });
            },
            eliminarH: function (id) {
                var hp = confirm("Esta seguro de eliminar el hospital?");
                if (hp == true)
                    this.$http
                        .delete(UrlHospital + "/" + id)
                        .then(function (json) {
                            this.getHospital();
                        });
            },
        },
    });
}
window.onload = init;
