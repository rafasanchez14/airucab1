@extends('layouts.master')
@section('title','Inventario')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu">INVENTARIO MENSUAL</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>Codigo-material</th>
          <th>Nombre</th>
          <th>Ubicación</th>
          <th>Cantidad Disponible</th>
          <th>Fecha inventario</th>
         
        </thead>
        @foreach($inventario as $inv)
        <tbody class="well">
          <td>{{$inv->codigo}}</td>
          <td>{{$inv->name}}</td>
          <td>{{$inv->sede}}</td>
          <td>{{$inv->cantidad}}</td>
          <td>{{$inv->fecha}}</td>
          
       </tbody>
       @endforeach
      </table>
    </div>
  </div>
</div>


@endsection