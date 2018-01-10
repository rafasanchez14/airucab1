@extends('layouts.master')
@section('title','Proveedores')
@section('content')
@include('layouts.messages')


<div class="container-fluid">
<div class="row">
 <div class="col-lg-4 col-lg-offset-1 ">
   <h2 class="col-lg-12" id="margenSubmenu">Mejor Planta </h2>
 </div>
</div>

<div class="container-fluid tabla">
<div class="row">
<div class="col-lg-8 col-lg-offset-1 ">
  <table class="table" style="margin-top:3em;">
    <thead id="botonAzul">
      <th>Codigo Sede</th>
      <th>Nombre Sede</th>
    </thead>
    @foreach($sedef as $se)
    <tbody class="well">
      <td>{{$se->cod}}</td>
      <td>{{$se->nombre}}</td>
   </tbody>
   @endforeach
  </table>
</div>
</div>
</div>


@endsection
