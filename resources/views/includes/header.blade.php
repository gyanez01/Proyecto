<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Sistema Paqueteria</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/home">Home</a></li>
        


        
      </ul>
      <ul class="nav navbar-nav navbar-right">
      @if(isset(Auth::user()->email))
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->email }}</a></li>
          <li><a href="{{ url('/main/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      @else
          <script>window.location = "/Main";</script>
      @endif
        
        
      </ul>
    </div>
  </div>
</nav>
<aside class="w3-sidebar w3-green w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    </br>
    <h3 ><b>- Administrar</b></h3>
  </div>
  <div class="w3-bar-block">
  
    <a href="/Clientes" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Clientes</a> 
    <a href="/Paquetes" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Paquetes</a> 
    <a href="/Transportes" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Transportes</a> 
    <a href="/Sucursales" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Sucursales</a> 
    <a href="/Personal" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Personal</a>
    <a href="/Equipos" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Equipos</a>
  </div>
  <div class="w3-container">
    <h3 ><b>- Catalogo</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="/Envios" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Envios</a> 
    <a href="/Entregas" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Entregas</a> 
    <a href="/Inventarios" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Inventario</a> 
    <a href="/RolDePago" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Roles de Pago</a> 
    
  </div>
</aside>
     
      
   




