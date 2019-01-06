@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Entregas</b></h1>
    <hr style="width:50px;border:5px solid green" class="w3-round">
  </div>
<form id="form1">
{{csrf_field()}}
<div class="row well">
    <div class="col-sm-4">
    <div class="input-group stylish-input-group col-sm-8 ">
                <input type="text" class="form-control"  placeholder="buscar por ID" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaEntrega')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
    </div>
        <div class="col-sm-4">
        <div class="form-group">
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirEntrega')}}">Añadir</button>
            <button type="submit" class="btn btn-warning" formmethod="post" formaction="{{URL::to('/modificarEntrega')}}">Modificar</button>
            <button type="sumbit" class="btn btn-danger" formmethod="post"formaction="{{URL::to('/eliminarEntrega')}}">Eliminar</button>
        </div>
        </div>
        <div class="col-sm-4"></div>
</div>
<br/>
<form>
    <div class="form-horizontal">

        @foreach($entregas as $entrega)
        <div class="form-group">
        <label class="control-label col-sm-3" for="enid">ID Entrega</label>
        <div class="col-sm-6">
            <input type="text" id="enid" class="form-control" value="{{$entrega->ENID}}" name="enid">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="traplaca">Transporte</label>
        <div class="col-sm-6">
        <select class="form-control" id="traplaca" name="traplaca">
            <option>{{$entrega->TRAPLACA}}</option>
            @foreach($transportes as $transporte)
                <option>{{$transporte->TRAPLACA}}</option>
            @endforeach
        </select>
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="sucid">Sucursal</label>
        <div class="col-sm-6">
        <select class="form-control" id="sucid" name="sucid">
            <option>{{$entrega->SUCID}}</option>
            @foreach($sucursales as $sucursal)
                <option>{{$sucursal->SUCID}}</option>
            @endforeach
        </select>
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="percedula">Personal</label>
        <div class="col-sm-6">
        <select class="form-control" id="percedula" name="percedula">
            <option>{{$entrega->PERCEDULA}}</option>
            @foreach($personal as $persona)
                <option>{{$persona->PERCEDULA}}</option>
            @endforeach
        </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha de creacion</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" value="{{$entrega->ENFECHACREACION}}" name="enfechacreacion">
                </div>
            <div class="col-sm-1">
            <span class="glyphicon glyphicon-calendar"></span>
                </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha de entrega</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker2" value="{{$entrega->ENFECHAENTREGA}}" name="enfechaentrega">
                </div>
            <div class="col-sm-1">
            <span class="glyphicon glyphicon-calendar"></span>
                </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="endetalles">Detalles</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="endetalles" value="{{$entrega->ENDETALLES}}" name="endetalles">
            </div>
        </div>

       

        @endforeach
        
    </div>
</form>


<div class="form-row">
    <div class="form-group col-md-12">
        <button type="button" id="añadir" class="btn btn-success " data-toggle="modal" data-target="#envios">Añadir Envio</button>
    </div>
</div>


<table class="table order-list" id ="tabla">
    <thead>
        <tr>
        <th colspan="1"></th>
            <th>ID</th>  
            <th>Cedula cliente</th>
            <th>Destino</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody id="cuerpo">
    @foreach($entenvs as $entenv)
        <tr>
            
            <td><form action="{{action('EntregaController@destroy', $entenv->ENVID)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit"><span class="oi oi-trash"></span></button>
            
          </form></td>
            <td contenteditable="false">{{$entenv->ENID}}</td>
            <td contenteditable="false">{{$entenv->CCEDULA}}</td>
            <td contenteditable="false">{{$entenv->ENVDESTINO}}</td>
            <td contenteditable="false">{{$entenv->ENVPRECIO}}</td>
                    
        </tr>
    @endforeach
        
    </tbody>
</table>



<!-- Modal -->
<div id="envios" class="modal fade" role="dialog">
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
        <label class="control-label col-sm-3" for="env">Envio</label>
        <div class="col-sm-6">
            <select class="form-control" id="env" name="env">
            <option>escoger envio</option>
            @foreach($envios as $envio)
                <option>{{$envio->ENVID}}</option>
            @endforeach
            </select>
            </div>
        </div>


        <div class="form-group">
        <label class="control-label col-sm-3" for="envid">ID</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" form="form1" id="envid"  name="envid">
            </div>
        </div>
        
        
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="ccedula">Cedula Cliente</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" form="form1" id="ccedula"  name="ccedula">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="envdestino">Destino</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" form="form1" id="envdestino"  name="envdestino">   
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="envprecio">Precio</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" form="form1" id="envprecio"  name="envprecio" >   
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="entrega">Entrega</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" form="form1" id="entrega"  name="entrega" readonly>   
            </div>
        </div>

        
    </div>			 
      </div>
      <div class="modal-footer">
      <button type="submit" id="acpetar" class="btn btn-primary" form="form1" formmethod="post" formaction="{{URL::to('/añadirDetEn')}}" >Aceptar</button>
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
    <script type="text/javascript">
        $('#datepicker2').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });         
    </script>
<script>

$("#envios").on("change", function () {

    var datos;
    	<?php if(isset($envios)){
		echo 'datos = '.json_encode($envios, JSON_HEX_TAG).';'; }?>
   
   datos.map(function(envio){
       if(envio.ENVID==document.getElementById('env').value){
        document.getElementById('envid').value = envio.ENVID
        document.getElementById('ccedula').value = envio.CCEDULA
        document.getElementById('envdestino').value = envio.ENVDESTINO
        document.getElementById('envprecio').value = envio.ENVPRECIO
       }
    

    })
});



$("#añadir").on("click", function () {

     document.getElementById('entrega').value = document.getElementById('enid').value
});

</script>

@stop