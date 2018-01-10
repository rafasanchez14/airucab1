@extends('layouts.master')
@section('title','Proveedores')
@section('content')
@include('layouts.messages')
<div class="container-fluid">
<div class="row">
 <div class="col-lg-4 col-lg-offset-1 ">
   <h2 class="col-lg-12" id="margenSubmenu">Promedio Mensual de Venta</h2>
 </div>
</div>


<div class="container-fluid tabla">
<div class="row">
<div class="col-lg-8 col-lg-offset-1 ">
  <table class="table" style="margin-top:3em;">
    <thead id="botonAzul">
      <th>Promedio Vendido</th>
      <th>Mes</th>
    </thead>
    @foreach($promensual as $mp)
    <tbody class="well">
      <td>{{$mp->promedio}}</td>
      <?php
      switch ($mp->mes) {
      case 1:
          $mesletra= "ENERO";
          break;
      case 2:
            $mesletra= "FEBRERO";
          break;
      case 3:
          $mesletra= "MARZO";
          break;
          case 4:
              $mesletra= "ABRIL";
              break;
          case 5:
              $mesletra= "MAYO";
              break;
          case 6:
              $mesletra= "JUNIO";
              break;
              case 7:
                  $mesletra= "JULIO";
                  break;
              case 8:
                  $mesletra= "AGOSTO";
                  break;
              case 9:
                $mesletra= "SEPTIEMBRE";
                  break;
                  case 10:
                      $mesletra= "OCTUBRE";
                      break;
                  case 11:
                      $mesletra= "NOVIEMBRE";
                      break;
                  case 12:
                      $mesletra= "DICIEMBRE";
                      break;
  }
  ?>
      <td>{{$mesletra}}</td>
   </tbody>
   @endforeach
  </table>
</div>
</div>
</div>
@endsection
