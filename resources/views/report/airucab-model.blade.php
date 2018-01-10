@extends('layouts.master')
@section('title','Modelo')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu">MODELO MAS VENDIDO</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>Codigo-modelo</th>
          <th>Nombre modelo</th>
          <th>Aviones-involucrados</th>
          
         
        </thead>
        @foreach($model as $modelo)
        <tbody class="well">
          <td>{{$modelo->codigo}}</td>
          <td>{{$modelo->nombre}}</td>
          <td>{{$modelo->avion}}</td>
        </tbody>
       @endforeach
      </table>
    </div>
  </div>
</div>


@endsection