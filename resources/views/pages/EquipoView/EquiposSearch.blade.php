@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Equipos</b></h1>
    <hr style="width:50px;border:5px solid green" class="w3-round">
  </div>




<form>
{{csrf_field()}}
 <div class="row">
 
 <div class="col-sm-3">

</div>

        <div class="col-sm-5">
        <div class="form-group">
           
        <div class="input-group stylish-input-group col-sm-8 ">
                <input type="text" class="form-control"  placeholder="buscar por codigo" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaEquipo')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirEquipo')}}">Añadir</button>
                     
            <button type="submit" class="btn btn-warning"  formmethod="post" formaction="{{URL::to('/modificarEquipo')}}">Modificar</button>
            
            
            <button type="sumbit" class="btn btn-danger" formmethod="post" formaction="{{URL::to('/eliminarEquipo')}}" >Eliminar</button>
            
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>


<br/>
 <div class="form-horizontal">

        @foreach($equipos as $equipo)
        <div class="form-group">
            <label class="control-label col-sm-3" for="eqcodigo">Codigo del equipo</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="eqcodigo" value="{{$equipo->EQCODIGO}}" name="eqcodigo">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="eqnombre">Nombre del equipo</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="eqnombre" value="{{$equipo->EQNOMBRE}}" name="eqnombre">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="eqdescripcion">Descripcion del equipo</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="eqdescripcion" value="{{$equipo->EQDESCRIPCION}}" name="eqdescripcion">
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha de adquicision</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" value="{{$equipo->EQFECHAADQUICISION}}" name="eqfechaadquicision">
                </div>
            <div class="col-sm-1">
            <span class="glyphicon glyphicon-calendar"></span>
                </div>
        </div>
        @endforeach


    </div>
</form>

<script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
         });
    </script>
@stop