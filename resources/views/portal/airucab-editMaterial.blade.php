@extends('layouts.master')

@section('title','Editar Materiales')

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">EDITAR MATERIALES</h2>
     </div>
  </div>

  <div class="container " id="margenSubmenu">
          <ul class="nav nav-tabs nav-justified ">
            <li class="active" ><a id="Amarillo" href="/materiaPrima" >Registrar Material</a></li>
            <li ><a id="Azul" href="/material" > Consultar Materiales</a></li>

          </ul>
</div>
          <div class="tab-content " >
            <div class="tab-pane fade in active" id="home">

              <div class="container-fluid " id="margenSubmenu">
  <div class="row ">
  {!! Form::model($material, ['method' => 'PATCH','route' => ['material.update',$material->cod_material]]) !!}

     <div class="col-lg-4 col-lg-offset-4 ">
      <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control" name="nombre" type="text" value="{{$material->nombre}}" placeholder="Ingrese nombre de la materia prima*">
      </div>


        <div class="form-group">
                 <label for="formGroup">Descripción</label>
                <textarea class="form-control" rows="4" name="descripcion" value="{{$material->descrip}}"  placeholder="Ingresa la descripción del material*" > </textarea>
            </div>

      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Agregar modificación</button></center>

      </div>

  </div>
</div>
</div>

 {!! Form::close() !!}



@endsection
