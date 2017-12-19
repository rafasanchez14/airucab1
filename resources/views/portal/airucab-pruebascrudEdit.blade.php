@extends('layouts.master')
@section('title','pruebas')
@section('content')
@include('layouts.messages')

<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">PRUEBAS</h2>
     </div>
  </div>

</div>

<div class="container " id="margenSubmenu">
          <ul class="nav nav-tabs nav-justified ">
            <li ><a id="Amarillo" href="/pruebascrud" >Pruebas</a></li>
            <li class="active" ><a id="Verde" href="/pruebas" >Pruebas Materiales</a></li>
          </ul>
</div>

<div class="tab-content " >
  <div class="tab-pane fade in active" id="prueba">
    <div class="container-fluid " id="margenSubmenu">
<div class="row ">
<div class="col-lg-4 col-lg-offset-4 " id="home">
  {!!Form::model($pru,['route'=>['pruebascrud.update',$pru->cod_prueba],'method'=>'PUT'])!!}
    <div class="form-group">
      {!!Form::label('nombre')!!}
       {!!Form::text('nombre_prueb',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre*','required'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('Descripcion')!!}
     {!!Form::textarea('descrip_prue',null,['class'=>'form-control','required'])!!}
  </div>
  <div class="row">
      <div class="">
        <div id="margenSubmenu">
          <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span>  Modificar Prueba</button></center>
{!!Form::close()!!}
        </div>
      </div>
  </div>


</div>
  </div>
  </div>
</div>
</div>
<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1 ">
      <table class="table">
        <thead id="botonAzul">
          <th>Codigo</th>
          <th>Fecha inicio</th>
          <th>Fecha fin</th>
          <th></th>
          <th></th>
        </thead>
        @foreach($pruebas as $prueba)
        <tbody class="well">
          <td>{{$prueba->cod_prueba}}</td>
          <td>{{$prueba->nombre_prueb}}</td>
          <td>{{$prueba->descrip_prue}}</td>
          <td>{!!link_to_route('pruebascrud.edit','Editar ',$parameters=$prueba->cod_prueba,$attributes=['class'=>'btn btn-success'])!!}
          </td>
          <td>{!!Form::open(['route'=>['pruebascrud.destroy',$prueba->cod_prueba],'method'=>'DELETE'])!!}
            {!!Form::submit('Eliminar',['class'=>'btn btn-danger' ])!!}
            {!!Form::close()!!}   </td>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
