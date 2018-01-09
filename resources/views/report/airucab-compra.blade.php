@extends('layouts.master')
@section('title','Compras')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu">LISTA DE COMPRAS</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>ID-Cliente</th>
          <th>Nombre</th>
          <th>Cantidad de compras</th>
         
        </thead>
        @foreach($cliente as $clientes)
        <tbody class="well">
          <td>{{$clientes->id}}</td>
          <td>{{$clientes->cliente}}</td>
          <td>{{$clientes->ordenes}}</td>
          
       </tbody>
       @endforeach
      </table>
    </div>
  </div>
</div>


@endsection