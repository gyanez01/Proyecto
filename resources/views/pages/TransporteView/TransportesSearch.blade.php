@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Transportes</b></h1>
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
                <input type="text" class="form-control"  placeholder="buscar por placa" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaTransporte')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirTransporte')}}">Añadir</button>
                     
            <button type="submit" class="btn btn-warning" formmethod="post" formaction="{{URL::to('/modificarTransporte')}}">Modificar</button>
            
            
            <button type="sumbit" class="btn btn-danger" formmethod="post" formaction="{{URL::to('/eliminarTransporte')}}" >Eliminar</button>
            
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>


<br/>
 <div class="form-horizontal">

        @foreach($transportes as $transporte)
        <div class="form-group">
            <label class="control-label col-sm-3" for="traplaca">Placa del transporte</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="traplaca" value="{{$transporte->TRAPLACA}}" name="traplaca">
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="tramarca">Marca del Transporte</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="tramarca" value="{{$transporte->TRAMARCA}}" name="tramarca">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="tratipo">Tipo de transporte</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="tratipo" value="{{$transporte->TRATIPO}}" name="tratipo">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Anio</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" value="{{$transporte->TRAANIO}}" name="traanio">
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