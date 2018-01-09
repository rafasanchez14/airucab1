@extends('layouts.master')
@section('title','Inventario')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 class="col-lg-12" id="margenSubmenu">PRODUCTO MAS PEDIDO</h2>
     </div>
  </div>


<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>Codigo-producto</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Numero de pedidos</th>
          
         
        </thead>
        @foreach($producto as $product)
        <tbody class="well">
          <td>{{$product->codigo}}</td>
          <td>{{$product->name}}</td>
          <td>{{$product->descri}}</td>
          <td>{{$product->cantidad}}</td>
          
          
       </tbody>
       @endforeach
      </table>
    </div>
  </div>
</div>


@endsection