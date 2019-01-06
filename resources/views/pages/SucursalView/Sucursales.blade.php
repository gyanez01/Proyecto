@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Sucursales</b></h1>
    <hr style="width:50px;border:5px solid green" class="w3-round">
  </div>

  @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif


<form>
{{csrf_field()}}
 <div class="row">
 
 <div class="col-sm-3">

</div>

        <div class="col-sm-5">
        <div class="form-group">
           
        <div class="input-group stylish-input-group col-sm-8 ">
                <input type="text" class="form-control"  placeholder="buscar por ID" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaSucursal')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirSucursal')}}">Añadir</button>
            <button type="submit" class="btn btn-warning" formmethod="post" formaction="{{URL::to('/modificarSucursal')}}">Modificar</button>
            <button type="sumbit" class="btn btn-danger" formmethod="post" formaction="{{URL::to('/eliminarSucursal')}}" >Eliminar</button>
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>


<br/>
 <div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-3" for="sucid">ID de la sucursal</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="sucid" placeholder="ID" name="sucid">
            </div>
        </div>


        <div class="form-group">
        <label class="control-label col-sm-3" for="sucnombre">Nombre de la sucursal</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="sucnombre" placeholder="Nombre" name="sucnombre">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="sucdireccion">Direccion de la sucursal</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="sucdireccion" placeholder="Direccion" name="sucdireccion">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="suctelefono">Telefono de la sucursal</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="suctelefono" placeholder="Telefono" name="suctelefono">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha de Apertura</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" name="sucfechaapertura">
                </div>
            <div class="col-sm-1">
            <span class="glyphicon glyphicon-calendar"></span>
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
@stop