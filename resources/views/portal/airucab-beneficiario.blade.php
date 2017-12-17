@extends('layouts.master')

@section('title','Registro')

@section('content')

<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">REGISTRO</h2>
     </div>
  </div>

</div>
<div class="container " id="margenSubmenu">
  <ul class="nav nav-tabs nav-justified ">
    <li class="" ><a id="Amarillo" href="/registro" >Personal</a></li>
    <li class="active"><a id="Azul" href="/beneficiarios" >Beneficiario</a></li>
    <li ><a id="Azul" href="/clientes" > Clientes</a></li>
    <li id="margenPregunta"><a id="Verde" href=/proveedores>Proveedores</a></li>
  </ul>
</div>
<div id="beneficiarios">
<div class="row">
  <div class="col-lg-4 col-lg-offset-4 ">
    <form class="" action="/inserta-bene" method="post">

      <div class="form-group col">
    <label for="formGroup">Cedula</label>
    <input class="form-control" name="cedula" type="text" placeholder="Ingrese dni*">
    </div>
    <div class="form-group col">
  <label for="formGroup">Nombre</label>
  <input class="form-control" name="nombre_bene" type="text" placeholder="Ingrese nombre*">
  </div>

  <div class="form-group">
  <label for="formGroup">Apellido</label>
  <input class="form-control"  name="apellido_bene" type="text" placeholder="Ingrese nombre*">
  </div>
  <div class="form-group">
     <label for="formGroup">pais</label>
     <select name= "pais" id="pais" class="form-control" required>
        <option value="">Seleccione el pais donde reside</option>
        @foreach($lugares as $lugar)
        <option value="{{$lugar->id_lugar}}">{{$lugar->nombre_lugar}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
     <label for="formGroup">estado</label>
     <select name= "estado" id="estado" class="form-control" required>
        <option value="">Seleccione el estado donde reside</option>
    </select>
  </div>
   <div class="form-group">
     <label for="formGroup">Municipio</label>
     <select name= "municipio" id="municipio" class="form-control" required>
        <option value="">Seleccione el municipio donde reside</option>
    </select>
  </div>
  <div class="form-group">
     <label for="formGroup">Parroquia</label>
     <select name= "parroquia" id="parroquia" class="form-control" required>
        <option value="">Seleccione la parroquia donde reside</option>
    </select>
  </div>
<div class="form-group">
  <label for="formGroup">Beneficiado</label>
  <select name= "perso" id="perso" class="form-control" required>
     <option value="">Seleccione Empleado</option>
     @foreach($personal as $per)
     <option value="{{$per->id_personal}}">{{$per->perso}}</option>
   @endforeach
 </select>
   </div>
<div class="" id="phones">

<label for="formGroup-lg">Telefono</label>
<div class="row">
<div class="col-xs-4">
 <div class="form-group">
        <input class="form-control" name="codarea[]" type="text" placeholder="Cod Area*">
    </div>
</div>
        <div class="col-xs-4">
      <div class="form-group">
                <input class="form-control"  name="telefono[]" type="text" placeholder="telefonob*">
               </div>
        </div>
                <div class="col-xs-4">
    <button type="button" class="btn btn-default addButton" onclick="dynamic_phones();" > <i class="fa fa-plus"></i> </button>
    </div>
</div>

</div>
      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span>  Beneficiario</button></center>
    </form>
      </div>
</div>
</div>

<script>
      var add = 1;
      function dynamic_phones() {
      add++;
      var objTo = document.getElementById('phones')
      var divtest = document.createElement("div");
      divtest.setAttribute("class", "form-group removeclass"+add);
      var rdiv = 'removeclass'+add;
      divtest.innerHTML = '<div class="form-group "> <div class="row"> <div class="col-lg-4"> <input class="form-control" name="codarea[]" type="text" placeholder="Cod Area*"></div>'+
            ' <div class="col-xs-4"> <input class="form-control" name="telefono[]" type="text" placeholder="Ingrese el telefono*">'+
                  ' </div> <div class="col-xs-4"> <button type="button" class="btn btn-danger" onclick="remove_dynamic_phones('+ add +');" > <i class="fa fa-minus"></i> </button></span> </div></div> </div>';
      objTo.appendChild(divtest)
  }
    function remove_dynamic_phones(rid) {
    $('.removeclass'+rid).remove();
  }
</script>
</div>
@endsection
