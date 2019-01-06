@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Paquetes</b></h1>
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
                <input type="text" class="form-control"  placeholder="buscar por cedula" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaPaquete')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirPaquete')}}">Añadir</button>
                     
            <button type="submit" class="btn btn-warning"  formmethod="post" formaction="{{URL::to('/modificarPaquete')}}">Modificar</button>
            
            
            <button type="sumbit" class="btn btn-danger" formmethod="post" formaction="{{URL::to('/eliminarPaquete')}}" >Eliminar</button>
            
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>


<br/>
 <div class="form-horizontal">

        @foreach($paquetes as $paquete)
        <div class="form-group">
            <label class="control-label col-sm-3" for="paqid">ID</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="paqid" value="{{$paquete->PAQID}}" name="paqid">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="paqdescripcion">Descripcion del Paquete</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="paqdescripcion" value="{{$paquete->PAQDESCRIPCION}}" name="paqdescripcion">
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha de Ingreso</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" name="paqfechaingreso" value="{{$paquete->PAQFECHAINGRESO}}">
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