@extends('layouts.master')

@section('title','Materiales')

@section('content')


	<div class="container" >

	@if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissable">
        <a href="" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ $message }}</p>
        </div>
    @endif

	</div>

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





             <div class="table-responsive" id="margenSubmenu">
  <div id="height">
  <table class="table table-fixed">
    <thead id="textColor">
    <th class="col-xs-3">Codigo</th>
        <th class="col-xs-2">Nombre</th>
        <th class="col-xs-2 center">Descripción</th>

        <th  class="col-xs-2 center"   colspan="2">Acciones</th>

    </thead>
     @foreach($material as $materiales)

    <tbody id="margenPregunta">

    <td class="col-xs-3">{{$materiales->cod}}</td>
    <td class="col-xs-2">{{$materiales->nombre}}</td>
      <td class="col-xs-2 center">{{$materiales->description}}</td>
      <td> <a href = "{{ route('material.edit',$materiales->cod) }}"> <button type="button" class="btn btn-primary" > Editar </button> </a> </td>
      <td>  <a href ='delete/{{$materiales->cod}}'> <button type="button" class="btn btn-primary" > Eliminar </button> </a> </td>

    </tbody>
    @endforeach
  </table>
  </div>
</div>





   </div>
 </div>













@endsection
