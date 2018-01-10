@extends('layouts.master')
@section('title','MejorPlazo')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu">Aviones Mas Rentables</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>Codigo Avion</th>
          <th>Modelo</th>
          <th>Promedio Duracion (Dias)</th>
        </thead>
        @foreach($mejorp as $mp)
        <tbody class="well">
          <td>{{$mp->cod_av}}</td>
          <td>{{$mp->modelo}}</td>
          <td>{{$mp->prom}}</td>
       </tbody>
       @endforeach
      </table>
    </div>
  </div>
</div>


@endsection
