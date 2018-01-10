@extends('layouts.master')
@section('title','Producción')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu"> PRODUCCIÓN</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
         
          <th>Codigo-producción</th>
          <th>Avión</th>
          <th>Estatus</th>
          <th>Fecha-culminación</th>
          
        </thead>
        @foreach($produccion as $pro)
        <tbody class="well">
          <td>{{$pro->codigo}}</td>
          <td>{{$pro->avion}}</td>
          <td>{{$pro->estatus}}</td>
          <td>{{$pro->fecha}}</td>
        </tbody>
       @endforeach
      </table>
      
      @foreach($cant as $canti)
      
      <p>Producción anual:{{$canti->produccion}} aviones</p>
    
      @endforeach

       </div>
      </div>
  </div>
</div>

@endsection