@extends('layouts.master')
@section('title','Pruebas')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu"> PRODUCTOS</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
         
          <th>Nombre</th>
          <th>Prueba</th>
          <th>Estatus</th>
          
        </thead>
        @foreach($materiales as $mat)
        <tbody class="well">
          <td>{{$mat->name}}</td>
          <td>{{$mat->prueba}}</td>
          <td>{{$mat->estatus}}</td>
        </tbody>
       @endforeach
      </table>
      
      @foreach($cantidad as $cant)
      
      <p>cantidad de productos que no cumplieron con la pruebas de calidad:{{$cant->cantidad}} materiales</p>
    
      @endforeach


      </div>
  </div>
</div>

      <div class="container-fluid tabla">
      <div class="row">
      <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:2em;">
        <thead id="botonAzul">
         
          <th>Nombre</th>
          <th>Prueba</th>
          <th>Estatus</th>
          
        </thead>
        @foreach($piezas as $piece)
        <tbody class="well">
          <td>{{$piece->name}}</td>
          <td>{{$piece->prueba}}</td>
          <td>{{$piece->estatus}}</td>
        </tbody>
       @endforeach
      </table>
  
      @foreach($canti as $cant)
      
      <p>cantidad de productos que no cumplieron con la pruebas de calidad:{{$canti->cant}} piezas</p>
    
      @endforeach

      </div>
   </div>
  </div>
</div>


@endsection