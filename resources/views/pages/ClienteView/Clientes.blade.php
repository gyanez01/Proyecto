@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Clientes.</b></h1>
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
                <input type="text" class="form-control"  placeholder="buscar por cedula" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaCliente')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirCliente')}}">Añadir</button>
            <button type="submit" class="btn btn-warning" formmethod="post" formaction="{{URL::to('/modificarCliente')}}">Modificar</button>
            <button type="sumbit" class="btn btn-danger" formmethod="post" formaction="{{URL::to('/eliminarCliente')}}">Eliminar</button>
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>


<br/>
 <div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-3" for="ccedula">Cedula</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="ccedula" placeholder="Cedula" name="ccedula">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="cnombre">Nombre</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cnombre" placeholder="Nombre" name="cnombre">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="cdireccion">Direccion</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="cdireccion" placeholder="Direccion" name="cdireccion">
            </div>
        </div>
      
        <div class="form-group">
        <label class="control-label col-sm-3" for="ccorreo">Correo</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="ccorreo" placeholder="Correo" name="ccorreo">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="ctelefono">Telefono</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="ctelefono" placeholder="Telefono" name="ctelefono" >
            </div>
        </div>

        


        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha de Nacimiento</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" name="cfechanacimiento">
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