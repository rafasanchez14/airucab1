@extends('layouts.master')
@section('title','Alas')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu">TIPO DE ALA</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>Codigo-pieza</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Modelos-involucrados</th>
          
        </thead>
        @foreach($alas as $ala)
        <tbody class="well">
          <td>{{$ala->codigo}}</td>
          <td>{{$ala->pieza}}</td>
          <td>{{$ala->descr}}</td>
          <td>{{$ala->cantidad}}</td>
         
          
       </tbody>
       @endforeach
      </table>
    </div>
  </div>
</div>


@endsection