@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Personal</b></h1>
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
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaPersonal')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirPersonal')}}">Añadir</button>
            <button type="submit" class="btn btn-warning"  formmethod="post" formaction="{{URL::to('/modificarPersonal')}}">Modificar</button>
            <button type="sumbit" class="btn btn-danger" formmethod="post" formaction="{{URL::to('/eliminarPersonal')}}" >Eliminar</button>
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>


<br/>
 <div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-3" for="percedula">Cedula Personal</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="percedula" placeholder="Cedula" name="percedula">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="pernombre">Nombre del Personal</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="pernombre" placeholder="Nombre" name="pernombre">
            </div>
        </div>


        <div class="form-group">
        <label class="control-label col-sm-3" for="perapellido">Apellido del Personal</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="perapellido" placeholder="Apellido" name="perapellido">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="percargo">Cargo que ocupa</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="percargo" placeholder="Cargo" name="percargo">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha de Nacimineto</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" name="perfechanacimiento">
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