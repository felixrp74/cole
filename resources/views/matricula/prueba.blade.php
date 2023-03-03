hola prueba

<input value="buscar" type="button" @click="getBusqueda()">

<div class="container" id="root">
    <input type="text" class="form-control"
           v-model="txtBusqueda"
           v-on:keyup="getBusqueda()"
           list="listaDescripcion" />

    <datalist id="listaDescripcion">
        
    </datalist> 
     
 
    
</div>
    <p v-else>No quedan todos!</p>
  



<div class="row">
    <div class="col-md-4" style="text-align: center;">
        <h2>Bien</h2>
        <p>Equipos de computo, CPU, Monitor, Teclado y Mouse.</p>
        <p>
            <a target="_blank" class="btn btn-default" href="~/Movimiento/Anadir">
                <i class="fa fa-desktop fa-8x" aria-hidden="true"></i>
            </a>
        </p>
    </div>
    <div class="col-md-4" style="text-align: center;">
        <h2>Celular</h2>
        <p>Equipos celulares móviles.</p>
        <p>
            <a target="_blank" class="btn btn-default" href="~/MovimientoCelular/AnadirCelular">
                <i class="fa fa-mobile fa-8x" aria-hidden="true"></i>
            </a>
        </p>
    </div>
    <div class="col-md-4" style="text-align: center;">
        <h2>Buscar</h2>
        <p>Buscar a la planilla de Electro Puno S.A.A.</p>
        <p>
            <a target="_blank" class="btn btn-default" href="~/Movimiento/Vista">
                <i class="fa fa-search fa-8x" aria-hidden="true"></i>
            </a>
        </p>
    </div>

    
</div>

 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.2/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->



<script>
    var delayTimer;
    var app = new Vue({
        el: "#root",
        data: {
            txtBusqueda: "",
            listaResultados: []
        },
        methods: {
            getBusqueda() {
                axios.get("http://127.0.0.1:8000/estudiante/1" )
                            .then(function (response) {
                                console.log(response.data);
                                app.listaResultados = response.data;
                            }).catch(function (error) {
                                console.log(error);
                            })
                // clearTimeout(delayTimer);
                // delayTimer = setTimeout(function () {
                //     if (app.txtBusqueda !== "") {
                //         let cadena = app.txtBusqueda.trim();
                //         let cantidad = 10;
                //         axios.get("http://127.0.0.1:8000/estudiante/1" )
                //             .then(function (response) {
                //                 console.log(response.data);
                //                 app.listaResultados = response.data;
                //             }).catch(function (error) {
                //                 console.log(error);
                //             })
                //     }
                // }, 500);
            },
            mounted() {
                this.getBusqueda();

                window.addEventListener('keyup', function (event) {
                    if (event.keyCode === 13) {
                        app.callEvent();
                    }
                });
            }
        }

    });
</script>

