@extends('layouts.master')
@section('title','Inventario')
@section('content')
@include('layouts.messages')


<div class="container-fluid">
<div class="row">
 <div class="col-lg-4 col-lg-offset-1 ">
   <h2 class="col-lg-12" id="margenSubmenu">Mejor EquipoL</h2>
 </div>
</div>

<div class="container-fluid tabla">
<div class="row">
<div class="col-lg-8 col-lg-offset-1 ">
  <table class="table" style="margin-top:3em;">
    <thead id="botonAzul">
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Equipo</th>
    </thead>
    @foreach($equi as $eq)
    <tbody class="well">
      <td>{{$eq->nombre}}</td>
      <td>{{$eq->apellido}}</td>
      <td>{{$eq->cod_equipo}}</td>
   </tbody>
   @endforeach
  </table>
</div>
</div>
</div>


@endsection
