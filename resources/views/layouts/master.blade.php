<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
   <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!!Html::style('css/bootstrap.css')!!}
    {!!Html::style('estilos.css')!!}
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>
<nav class="navbar navbar-default  navbar-static-top navbar-inverse arreglo" role="navigation" id="menu">
    <div class="container ">
      <div class="navbar-header" >
          <button type="button" class="navbar-toggle" data-toggle="collapse" id="fondobarraxs"
              data-target=".navbar-ex1-collapse">
             <span class="sr-only">Desplegar navegación</span>
             <span class="icon-bar" id="colorbarritas"></span>
             <span class="icon-bar" id="colorbarritas"></span>
             <span class="icon-bar" id="colorbarritas"></span>
          </button>
         <a class="navbar-brand visible-lg visible-md bajarlogo"  href="/">{{HTML::image('ucab/logo.png','logo-AirUcab',array ('class' => 'img-responsive'))}}</a>
         <a class="navbar-brand visible-xs visible-sm" href="/">{{HTML::image('ucab/logoP.png','logo-AirUcab',array ('class' => 'img-responsive'))}}</a>
      </div>

    <div class="collapse navbar-collapse  navbar-ex1-collapse ">
    <ul class="nav navbar-nav navbar-right  " >
      <li id="fondobarra"><a href="/" id="texto">INICIO</a></li>

          <li id="fondobarra"><a href="/registro" id="texto">REGISTRO</a></li>
          <li id="fondobarra"><a href="/materiaPrima" id="texto">MATERIA PRIMA</a></li>
          <li id="fondobarra"><a href="/pruebas" id="texto">PRUEBAS</a></li>
          <li id="fondobarra"><a href="/sedes" id="texto">SEDES</a></li>
          <li id="fondobarra"><a href="/diseñoAvion" id="texto">DISEÑO DE AVIÓN</a></li>
            <li id="fondobarra"><a href="" id="texto">PIEZA</a></li>
            <li id="fondobarra"><a href="" id="texto">DISTRIBUCIÓN</a></li>
      </ul>

    </div>

    </div>
  </nav>

    @yield('content')
 
 
  
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4" id="fondopiedepagina">
          <ul class="list-inline quicklinks">
            <li><a id="coloritem" href="/quienes-somos">¿Quiénes somos?</a></li>
            <li><a id="coloritem" href="/contacto">Contáctanos</a></li>
          </ul>
      </div>
      <div class="col-md-4" id="fondopiedepagina">
          <ul class="list-inline quicklinks social">
            <li > <a href="#"> <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i> </a> </li>
            <li > <a href="#"> <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a> </li>
          </ul>
      </div>
      <div class="col-md-4" id="fondopiedepagina">
        <ul class="list-inline quicklinks">
          <li><a id="coloritem" href="/aviso-de-privacidad">Aviso de privacidad</a></li>
          <li><a id="coloritem" href="/terminos-y-condiciones">Terminos y condiciones</a></li>
        </ul>
      </div>
    </div>

       <div class="row">
      <div class="col-md-12" id="fondopiedepagina">
        <ul class="list-inline quicklinks">
          <li><a id="coloritem" href="#">{{HTML::image('ucab/logoP.png','logo-AirUcab',array ('class' => 'img-responsive'))}}</a></li>
        </ul>

      </div>

      <div class="col-md-12" id="fondoultimo">
        <ul class="list-inline quicklinks">
          <h6>COPYRIGHT 2017 | TODOS LOS DERECHOS RESERVADOS</h6>
        </ul>
      </div>
    </div>
  </div>
</footer>


{!!Html::script('js/jquery-3.1.1.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
@yield('script')



<script>

$(function (){   
   $('#pais').on('change',buscarEstado);
   $('#estado').on('change',buscarMunicipio);
   $('#municipio').on('change',buscarParroquia);

    });

    function  buscarEstado() {
    var pais= $(this).val();
    $.get('/buscarEstado/'+pais+'/pertenece', function (data)
      { 
        
        var html_select='<option  value="">Estado al que pertenece</option>';
        $('#estado').html(html_select);
        for (var i = 0; i < data.length; ++i) 
        {
          html_select +='<option value="'+data[i].id_lugar+'">'+data[i].nombre_lugar+'</option>';
          $('#estado').html(html_select);
        }
      });
    
  }

  function  buscarMunicipio() {
    var estado= $(this).val();
    $.get('/buscarMunicipio/'+estado+'/pertenece', function (data)
      { 
        
        var html_select='<option  value="">Municipio al que pertenece</option>';
        $('#municipio').html(html_select);
        for (var i = 0; i < data.length; ++i) 
        {
          html_select +='<option value="'+data[i].id_lugar+'">'+data[i].nombre_lugar+'</option>';
          $('#municipio').html(html_select);
        }
      });
    
  }

  function  buscarParroquia() {
    var estado= $(this).val();
    $.get('/buscarParroquia/'+estado+'/pertenece', function (data)
      { 
        
        var html_select='<option  value="">Parroquia a la que pertenece</option>';
        $('#parroquia').html(html_select);
        for (var i = 0; i < data.length; ++i) 
        {
          html_select +='<option value="'+data[i].id_lugar+'">'+data[i].nombre_lugar+'</option>';
          $('#parroquia').html(html_select);
        }
      });
    
  }

$(document).ready(function(){

  $("#m1").hide(500);
   $("#m2").hide(500);
    $("#m3").hide(500);
     $("#m4").hide(500);

})

function  m1() {

     $("#m1").show(500);
      $("#m2").hide(500);
       $("#m3").hide(500);
        $("#m4").hide(500);
        $("#m5").hide(500);
         $("#m6").hide(500);

  }
  function  m1() {

       $("#m1").show(500);
        $("#m2").hide(500);
         $("#m3").hide(500);
          $("#m4").hide(500);
          $("#m5").hide(500);
           $("#m6").hide(500);

    }
    function  m2() {

         $("#m2").show(500);
          $("#m1").hide(500);
           $("#m3").hide(500);
            $("#m4").hide(500);
            $("#m5").hide(500);
             $("#m6").hide(500);

      }
      function  m3() {

           $("#m3").show(500);
            $("#m2").hide(500);
             $("#m1").hide(500);
              $("#m4").hide(500);
              $("#m5").hide(500);
               $("#m6").hide(500);

        }
        function  m4() {

             $("#m4").show(500);
              $("#m2").hide(500);
               $("#m3").hide(500);
                $("#m1").hide(500);
                $("#m5").hide(500);
                 $("#m6").hide(500);

          }
          function  m5() {

               $("#m5").show(500);
                $("#m2").hide(500);
                 $("#m3").hide(500);
                  $("#m1").hide(500);
                  $("#m6").hide(500);
                   $("#m4").hide(500);

            }
            function  m6() {

                 $("#m6").show(500);
                  $("#m2").hide(500);
                   $("#m3").hide(500);
                    $("#m1").hide(500);
                    $("#m5").hide(500);
                     $("#m4").hide(500);

              }

</script>



</body>

</html>
