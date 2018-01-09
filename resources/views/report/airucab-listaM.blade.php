@extends('layouts.master')
@section('title','modelos')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu">LISTA DE MODELOS</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
    <table class="table" style="margin-top:3em;">
      <thead id="botonAzul">
  	<TR><TH>Medidas</TH>
      @foreach($modelos as $modelo)
  	<TD>{{$modelo->nombre_modelo}}</TD>
    @endforeach
    </TR>
    </thead>
    <TR><TH> Tripulacion</TH>
      @foreach($modelos as $modelo)
  	<TD>{{$modelo->tripulacion}}</TD>
    @endforeach
    </TR>
    <TR><TH>Capacidad de pasajeros</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->capacidad}}</TD>
    @endforeach
    </TR>
    <TR><TH>Distancia entre asientos</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->dist_as}}</TD>
    @endforeach
    </TR>
    <TR><TH>Ancho de los Asientos</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->ancho_as}}</TD>
    @endforeach
    </TR>
    <TR><TH>Longitud</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->longitud}}</TD>
    @endforeach
    </TR>
    <TR><TH>Envergadura</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->envergadura}}</TD>
    @endforeach
    </TR>
    <TR><TH>Altura</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->altura}}</TD>
    @endforeach
    </TR>
    <TR><TH>Flecha Alar</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->flecha_alar}}</TD>
    @endforeach
    </TR>
    <TR><TH>Ancho Fuselaje</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->an_fuselaje}}</TD>
    @endforeach
    </TR>
    <TR><TH>Alto Fuselaje</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->alto_fuselaje}}</TD>
    @endforeach
    </TR>
    <TR><TH>Ancho de la Cabina de pasajeros</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->ancho_cabina}}</TD>
    @endforeach
    </TR>
    <TR><TH>Alto de la Cabina</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->alto_cabina}}</TD>
    @endforeach
    </TR>
    <TR><TH>Peso Vacio</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->peso_vacio}}</TD>
    @endforeach
    </TR>
    <TR><TH>Peso Maximo de despegue</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->peso_maxd}}</TD>
    @endforeach
    </TR>
    <TR><TH>Peso Maximo de aterrizaje</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->peso_maxa}}</TD>
    @endforeach
    </TR>
    <TR><TH>Volumen de carga</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->volumenca}}</TD>
    @endforeach
    </TR>
    <TR><TH>Carrera de despegue con peso maximo</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->cardespegue}}</TD>
    @endforeach
    </TR>
    <TR><TH>Techo de servicio</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->techoserv}}</TD>
    @endforeach
    </TR>
    <TR><TH>Velocidad Crucero</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->velo_crucero}}</TD>
    @endforeach
    </TR>
    <TR><TH>Velocidad Maxima</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->velomax}}</TD>
    @endforeach
    </TR>
    <TR><TH>Alcance con carga maxima</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->alcancemax}}</TD>
    @endforeach
    </TR>
    <TR><TH>Maxima capacidad de combustible</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->maxcomb}}</TD>
    @endforeach
    </TR>
    <TR><TH>Motor</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->motor}}</TD>
    @endforeach
    </TR>
    <TR><TH>Motor</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->motor}}</TD>
    @endforeach
    </TR>
    <TR><TH>Empuje maximo (x2)</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->empujemax}}</TD>
    @endforeach
    </TR>
    <TR><TH>Empuje maximo (x2)</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->empujemax}}</TD>
    @endforeach
    </TR>
    <TR><TH>Empuje a velocidad crucero</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->empuje}}</TD>
    @endforeach
    </TR>
    <TR><TH>Diametro de los alabes o las aspas del motor</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->diame_ala}}</TD>
    @endforeach
    </TR>
    <TR><TH>Longitud del motor</TH>
      @foreach($modelos as $modelo)
    <TD>{{$modelo->long_motor}}</TD>
    @endforeach
    </TR>


  </TABLE>
    </div>
  </div>
</div>


@endsection
