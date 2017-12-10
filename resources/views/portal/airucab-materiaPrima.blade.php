@extends('layouts.master')

@section('title','Materia Prima')

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">REGISTRO DE MATERIA PRIMA</h2>
     </div>
  </div>
  
</div>
<div class="container-fluid well" id="margenSubmenu">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-4 ">
      <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control"  type="text" placeholder="Ingrese nombre de la materia prima*">
      </div>
      <div class="form-group">
         <label for="formGroup">Cantidad</label>
          <input class="form-control"  type="text" placeholder="Ingrese cantidad*">
      </div>


      <div class="form-group">
        <label for="formGroup">Proveedor </label>
          <select name= "proveedor" id="proveedor" class="form-control" required>
            <option value="">seleccione el proveedor</option>
            @foreach($proveedores as $proveedor) 
            <option value="{{$proveedor->id_proveedor}}">{{$proveedor->nombre}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="formGroup">Sede </label>
          <select name= "sede" id="sexo" class="form-control" required>
            <option value="">Ingrese la sede</option>
            @foreach($sedes as $sede) 
            <option value="{{$sede->cod_sede}}">{{$sede->nombre_sede}}</option>
          @endforeach
        </select>
      </div>
       <div class="form-group">
                 <label for="formGroup">Fecha de llegada</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_ini" id="fecha_ini" placeholder="Ingresa la fecha" >
            </div>

      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Agregar Materia Prima</button></center> 
       
      </div>
    
  </div>
</div>
</div>
@endsection