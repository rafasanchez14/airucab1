@extends('layouts.master')
@section('title','Proveedores')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu">LISTA DE PROVEEDORES</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>ID</th>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Monto</th>
          <th>Lugar</th>
        </thead>
        @foreach($proveedores as $proveedor)
        <tbody class="well">
          <td>{{$proveedor->id}}</td>
          <td>{{$proveedor->nombre}}</td>
          <td>{{$proveedor->fecha}}</td>
          <td>{{$proveedor->monto}}</td>
          <td>{{$proveedor->lugar}}</td>
       </tbody>
       @endforeach
      </table>
    </div>
  </div>
</div>


@endsection