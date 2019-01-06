<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>


   
        @include('includes.header')
   
   
        <div class="w3-main" style="margin-left:340px;margin-right:40px">
        @yield('content')
        </div>
  

    <footer class="row">
        @include('includes.footer')
    </footer>


</body>
</html>