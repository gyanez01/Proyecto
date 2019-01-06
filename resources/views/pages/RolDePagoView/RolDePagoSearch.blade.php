@extends('layouts.default')
@section('content')

<div class="w3-container" style="margin-top:80px" id="showcase">
    
    <h1 class="w3-xxxlarge w3-text-green"><b>Roles de Pago</b></h1>
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
                <input type="text" class="form-control"  placeholder="buscar por placa" name="busqueda" >
                <span class="input-group-btn">
            <button class="btn btn-default" type="submit" formmethod="get" formaction="{{URL::to('/busquedaRolDePago')}}">
                <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" formmethod="post" formaction="{{URL::to('/añadirRolDePago')}}">Añadir</button>
                     
            <button type="submit" class="btn btn-warning" formmethod="post" formaction="{{URL::to('/modificarRolDePago')}}">Modificar</button>
            
            
            <button type="sumbit" class="btn btn-danger" formmethod="post" formaction="{{URL::to('/eliminarRolDePago')}}" >Eliminar</button>
            
        </div>
        </div>
        <div class="col-sm-4"></div>
        </div>


<br/>
 <div class="form-horizontal">

        @foreach($roles as $rol)
        <div class="form-group">
            <label class="control-label col-sm-3" for="rolid">ID</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="rolid" value="{{$rol->ROLID}}" name="rolid" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="datepicker">Fecha de Rol</label>
            <div class="col-sm-2">
            <input class="date form-control"  type="text" id="datepicker" value="{{$rol->ROLFECHA}}" name="rolfecha">
                </div>
            <div class="col-sm-1">
            <span class="glyphicon glyphicon-calendar"></span>
                </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="pernombre">Personal</label>
        <div class="col-sm-6">
        <select class="form-control" id="sucnombre" name="pernombre">
            <option>escoger personal</option>
            @foreach($personal as $persona)
                <option>{{$persona->PERNOMBRE}}</option>
            @endforeach
        </select>
            </div>
        </div>
        
        <div class="form-group">
        <label class="control-label col-sm-3" for="rolingreso">Ingresos totales</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rolingreso" value="{{$rol->ROLINGRESO}}" name="rolingreso">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="roldescuento">Descuento totales</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="roldescuento" value="{{$rol->ROLDESCUENTO}}" name="roldescuento">
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="roldescuento">Calcular</label>
        <div class="col-sm-6">
            <button type="button" id="calcular" class="btn btn-success " >Calcular</button>
            </div>
        </div>

        <div class="form-group">
        <label class="control-label col-sm-3" for="rolvalortotal">Valor total</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="rolvalortotal" value="{{$rol->ROLVALORTOTAL}}" name="rolvalortotal">
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

    <script>



$("#calcular").on("click", function () {

     document.getElementById('rolvalortotal').value = document.getElementById('rolingreso').value - document.getElementById('roldescuento').value
});

</script>
@stop