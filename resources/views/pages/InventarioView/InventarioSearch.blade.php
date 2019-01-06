@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Inventario.</b></h1>
    <hr style="width:50px;border:5px solid green" class="w3-round">
  </div>
<form id="form1">
{{csrf_field()}}
<div class="row well">
    <div class="col-sm-4">
    <div class="input-group stylish-input-group col-sm-8 ">
                <input type="text" class="form-control"  placeholder="buscar por ID" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaInventario')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
    </div>
        <div class="col-sm-4">
        <div class="form-group">
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirInventario')}}">Añadir</button>
            <button type="submit" class="btn btn-warning" formmethod="post" formaction="{{URL::to('/modificarInventario')}}">Modificar</button>
            <button type="sumbit" class="btn btn-danger" formmethod="post"formaction="{{URL::to('/eliminarInventario')}}">Eliminar</button>
        </div>
        </div>
        <div class="col-sm-4"></div>
</div>
<br/>
<form>
    <div class="form-horizontal">

        @foreach($items as $item)
        <div class="form-group">
        <label class="control-label col-sm-3" for="invid">ID inventario</label>
        <div class="col-sm-6">
            <input type="text" id="invid" class="form-control" value="{{$item->INVID}}" name="invid" readonly>
            </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-3" for="invobservacion">Observacion</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="invobservacion" value="{{$item->INVOBSERVACION}}" name="invobservacion">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="sucnombre">Sucursal</label>
        <div class="col-sm-6">
        <select class="form-control" id="sucnombre" name="sucnombre">
            <option>escoger Sucursal</option>
            @foreach($sucursales as $sucursal)
                <option>{{$sucursal->SUCNOMBRE}}</option>
            @endforeach
        </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha del Inventario</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" value="{{$item->INVFECHA}}" name="invfecha">
                </div>
            <div class="col-sm-1">
            <span class="glyphicon glyphicon-calendar"></span>
                </div>
        </div>
        @endforeach
        
    </div>
</form>


<div class="form-row">
    <div class="form-group col-md-12">
        <button type="button" id="añadir" class="btn btn-success " data-toggle="modal" data-target="#equipos">Añadir Equipo</button>
    </div>
</div>


<table class="table order-list" id ="tabla">
    <thead>
        <tr>
            <th colspan="1"></th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Fecha Adquicision</th>
        </tr>
    </thead>
    <tbody id="cuerpo">
    @foreach($invequipos as $inveq)
        <tr>
            
            <td><form action="{{action('InventarioController@destroy', $inveq->INVID)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit"><span class="oi oi-trash"></span></button>
            
          </form></td>
            <td contenteditable="false">{{$inveq->EQCODIGO}}</td>
            <td contenteditable="false">{{$inveq->EQNOMBRE}}</td>
            <td contenteditable="false">{{$inveq->EQDESCRIPCION}}</td>
            <td contenteditable="false">{{$inveq->EQFECHAADQUICISION}}</td>        
        </tr>
    @endforeach
        
    </tbody>
</table>



<!-- Modal -->
<div id="equipos" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Equipo</h4>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">

        <div class="form-group">
        <label class="control-label col-sm-3" for="cod">Equipo</label>
        <div class="col-sm-6">
            <select class="form-control" id="cod" name="cod">
            <option>escoger equipos</option>
            @foreach($equipos as $equipo)
                <option>{{$equipo->EQCODIGO}}</option>
            @endforeach
            </select>
            </div>
        </div>

        
        <div class="form-group">
        <label class="control-label col-sm-3" for="eqcodigo">Codigo</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" form="form1" id="eqcodigo" name="eqcodigo" readonly>
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="eqnombre">Nombre</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" form="form1" id="eqnombre" name="eqnombre" >
            </div>
        </div>
        
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="eqdescripcion">Descripcion</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" form="form1" id="eqdescripcion"  name="eqdescripcion">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="eqfechaadquicision">Fecha adquicision</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" form="form1" id="eqfechaadquicision"  name="eqfechaadquicision">   
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="inventario">Inventario ID</label>
        <div class="col-sm-6">
        <input type="text" class="form-control" form="form1" id="inventario"  name="inventario" readonly>   
            </div>
        </div>

        
    </div>			 
      </div>
      <div class="modal-footer">
      <button type="submit" id="acpetar" class="btn btn-primary" form="form1" formmethod="post" formaction="{{URL::to('/añadirDetInv')}}" >Aceptar</button>
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

$("#equipos").on("change", function () {

    var datos;
    	<?php if(isset($equipos)){
		echo 'datos = '.json_encode($equipos, JSON_HEX_TAG).';'; }?>
   
   datos.map(function(equipo){
       if(equipo.EQCODIGO==document.getElementById('cod').value){
        document.getElementById('eqcodigo').value = equipo.EQCODIGO
        document.getElementById('eqnombre').value = equipo.EQNOMBRE
        document.getElementById('eqdescripcion').value = equipo.EQDESCRIPCION
        document.getElementById('eqfechaadquicision').value = equipo.EQFECHAADQUICISION
       }
    

    })
});



$("#añadir").on("click", function () {

     document.getElementById('inventario').value = document.getElementById('invid').value
});

</script>

@stop