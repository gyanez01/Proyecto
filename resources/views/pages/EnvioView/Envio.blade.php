@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Envios</b></h1>
    <hr style="width:50px;border:5px solid green" class="w3-round">
  </div>
<form id="form1">
{{csrf_field()}}
<div class="row well">
    <div class="col-sm-4">
    <div class="input-group stylish-input-group col-sm-8 ">
                <input type="text" class="form-control"  placeholder="buscar por ID" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaEnvio')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
    </div>
        <div class="col-sm-4">
        <div class="form-group">
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirEnvio')}}">Añadir</button>
            <button type="submit" class="btn btn-warning" formmethod="post" formaction="{{URL::to('/modificarEnvio')}}">Modificar</button>
            <button type="sumbit" class="btn btn-danger" formmethod="post"formaction="{{URL::to('/eliminarEnvio')}}">Eliminar</button>
        </div>
        </div>
        <div class="col-sm-4"></div>
</div>
<br/>
<form>
    <div class="form-horizontal">
        <div class="form-group">
        <label class="control-label col-sm-3" for="envid">ID Envio</label>
        <div class="col-sm-6">
            <input type="text" id="envid" class="form-control" placeholder="ID" name="envid">
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-3" for="envdestino">Destino</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="envdestino" placeholder="Destino" name="envdestino">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="ccedula">Cliente</label>
        <div class="col-sm-6">
        <select class="form-control" id="ccedula" name="ccedula">
            <option>escoger cliente</option>
            @foreach($clientes as $cliente)
                <option>{{$cliente->CCEDULA}}</option>
            @endforeach
        </select>
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="envprecio">Precio</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="envprecio" placeholder="Precio" name="envprecio">
            </div>
        </div>

        
    </div>
</form>


<div class="form-row">
    <div class="form-group col-md-12">
        <button type="button" id="añadir" class="btn btn-success " data-toggle="modal" data-target="#paquetes">Añadir Paquete</button>
    </div>
</div>


<table class="table order-list" id ="tabla">
    <thead>
        <tr>
            <th colspan="1"></th>
            <th>ID</th>  
            <th>Descripcion</th>
            <th>Fecha Ingreso</th>
        </tr>
    </thead>
    <tbody id="cuerpo">
        
        
    </tbody>
</table>



<!-- Modal -->
<div id="paquetes" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Paquete</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
        



        <div class="form-group">
        <label class="control-label col-sm-3" for="paq">Paquete</label>
        <div class="col-sm-6">
            <select class="form-control" id="paq" name="paq">
            <option>escoger paquete</option>
            @foreach($paquetes as $paquete)
                <option>{{$paquete->PAQID}}</option>
            @endforeach
            </select>
            </div>
        </div>



        <div class="form-group">
        <label class="control-label col-sm-3" for="paqid">ID</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" form="form1" id="paqid" name="paqid" readonly>
            </div>
        </div>
        
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="paqdescripcion">Descripcion</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" form="form1" id="paqdescripcion"  name="paqdescripcion">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="eqfechaingreso">Fecha Ingreso</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" form="form1" id="eqfechaingreso"  name="eqfechaingreso">   
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="envio">Envio ID</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" form="form1" id="envio"  name="envio" readonly>   
            </div>
        </div>

        
    </div>			 
      </div>
      <div class="modal-footer">
      <button type="submit" id="acpetar" class="btn btn-primary" form="form1" formmethod="post" formaction="{{URL::to('/añadirDetEnv')}}" >Aceptar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
</form>



<script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
    </script>
<script>

$("#paquetes").on("change", function () {

    var datos;
    	<?php if(isset($paquetes)){
		echo 'datos = '.json_encode($paquetes, JSON_HEX_TAG).';'; }?>
   
   datos.map(function(paquete){
       if(paquete.paqid==document.getElementById('paq').value){
        document.getElementById('paqfechaingreso').value = paquete.PAQFECHAINGRESO
        document.getElementById('paqdescripcion').value = paquete.PAQDESCRIPCION
        document.getElementById('paqid').value = paquete.PAQID
       }
    

    })
});



$("#añadir").on("click", function () {

     document.getElementById('envio').value = document.getElementById('envid').value
});

</script>

@stop