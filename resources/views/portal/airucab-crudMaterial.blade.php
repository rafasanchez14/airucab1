@extends('layouts.master')
@section('title','Materiales')
@section('content')
@include('layouts.messages')



    <div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">REGISTRO DE MATERIALES </h2>
     </div>
  </div>

  <div class="container " id="margenSubmenu">
          <ul class="nav nav-tabs nav-justified ">
            <li ><a id="Amarillo" href="/materiaPrima" >Registrar Material</a></li>
            <li class="active" ><a id="Azul" href="" > Consultar Materiales</a></li>
          </ul>
  </div>

  <div class="container-fluid tabla ">
  <div class="row">
  <div class="col-lg-10 col-lg-offset-1 ">
        <table class="table" style="margin-top:6em;">
          <thead id="botonAzul">
           <th>Codigo</th>
           <th>Nombre</th>
           <th>Descripción</th>
           <th class="col-xs-2 center"colspan="2">Acciones</th>

          </thead>
     @foreach($material as $materiales)

    <tbody class="well">

    <td class="col-xs-3">{{$materiales->cod}}</td>
    <td class="col-xs-2">{{$materiales->nombre}}</td>
    <td class="col-xs-2">{{$materiales->description}}</td>
    <td> <a href = "{{route('material.edit',$materiales->cod) }}"> <button type="button" class="btn btn-success" > Editar </button> </a> </td>
    <td> <a href ='delete/{{$materiales->cod}}'> <button type="button" class="btn btn-danger" > Eliminar </button> </a> </td>

    </tbody>
    @endforeach
  </table>
  </div>
</div>
</div>





   </div>
 </div>

@endsection
