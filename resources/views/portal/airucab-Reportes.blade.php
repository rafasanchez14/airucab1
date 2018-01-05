@extends('layouts.master')
@section('title','Reportes')
@section('content')
@include('layouts.messages')

<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">LISTA DE REPORTES</h2>
     </div>
  </div>

</div>

<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>Nombre</th>
          <th>Acción</th>
        </thead>

        <tbody class="well">
           <tr>
            <td class="col-xs-3">Lista de proveedores</td>
            <td class="col-xs-2"> <a href ='/prov'> <button type="button" class="btn btn-success" >Generar </button> </a> </td>
           </tr>

           <tr>
            <td class="col-xs-3">Lista de Modelos</td>
            <td class="col-xs-2"> <a href = "/modelo"> <button type="button" class="btn btn-success" > Generar </button> </a> </td>
          </tr>

          <tr>
            <td class="col-xs-3">prueba</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar </button> </a> </td>
          </tr>
       </tbody>

       </table>

    </div>
  </div>

</div>


@endsection
