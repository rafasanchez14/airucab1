@extends('layouts.master')

@section('title','Pruebas')

@section('content')

<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">PRUEBAS</h2>
     </div>
  </div>

</div>

<div class="container margenMenu" id="margenSubmenu">
          <ul class="nav nav-tabs nav-justified ">
            <li class="active" ><a id="Amarillo" href="#home" role="tab" data-toggle="tab">Agregar</a></li>
            <li ><a id="Azul" href="#Lista" role="tab" data-toggle="tab"> Lista</a></li>
          </ul>
</div>
          <div class="tab-content " >
            <div class="tab-pane fade in active" id="home">

              <div class="container-fluid " id="margenSubmenu">
  <div class="row ">
    <div class="col-lg-4 col-lg-offset-4 " id="home">
<form class="" action="/inserta-materialprueba" method="post">
      <div class="form-group">
        <label for="formGroup">Pruebas </label>
          <select name= "prueba" id="prueba" class="form-control" required>
            <option value="">Ingrese la Prueba</option>
            @foreach($pruebas as $prueba)
            <option value="{{$prueba->cod_prueba}}">{{$prueba->nombre_prueb}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
                 <label for="formGroup">Fecha de Inicio</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2024-30-06" name="fecha_i" id="fecha_i" placeholder="Ingresa la fecha" >
        </div>
      <div class="form-group">
                 <label for="formGroup">Fecha de culminación</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2024-30-06" name="fecha_c" id="fecha_c" placeholder="Ingresa la fecha" >
        </div>
      <div class="form-group">
        <label for="formGroup">Materiales </label>
          <select name= "material" id="material" class="form-control" required>
            <option value="">Ingrese el material</option>
            @foreach($materiales as $material)
            <option value="{{$material->cod_material}}">{{$material->nombre}}</option>
          @endforeach
        </select>
      </div>
       <div class="form-group">
        <label for="formGroup">Sede </label>
          <select name= "sede" id="sede" class="form-control" required>
            <option value="">Ingrese la sede</option>
            @foreach($sedes as $sede)
            <option value="{{$sede->cod_sede}}">{{$sede->nombre_sede}}</option>
          @endforeach
        </select>
      </div>

      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span>  Agregar Prueba</button></center>
</form>

</div>

  </div>


</div>

</div>

            </div>

            <div class="tab-pane fade " id="Lista">
            <div class="container" id="margenSubmenu" >

<div class="row" >
  <div class="col-lg-4 col-lg-offset-8 col-xs-10 col-xs-offset-1">
<form class="" action="/buscarMatpru" method="GET">
    <div class="input-group" >
        <input type="text" class="form-control" name="clave"placeholder="Buscar por nombre" >
          <span class="input-group-btn ">
          <button  class="btn btn-info"  type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar </button>

      </span>
    </div>
      </form>
  </div>
</div>
             <div class="table-responsive" id="margenSubmenu">
  <div id="height">
  <table class="table table-fixed">
    <thead id="textColor">

        <th class="col-xs-1 center">CODIGO PRUEBA</th>
        <th class="col-xs-3 center">NOMBRE</th>
        <th class="col-xs-2 center">MATERIALES</th>
        <th class="col-xs-3 center">CULMINACIÓN</th>
        <th class="col-xs-3 center">SEDE</th>
    </thead>

  @foreach($pruebamat as $pm)
    <tbody id="margenPregunta">

      <td class="col-xs-1">{{$pm->cod_pruebamat}}</td>
      <td class="col-xs-3 center">{{$pm->nombre_prueb}}</td>
      <td class="col-xs-2 center">{{$pm->nombre}} </td>
      <td class="col-xs-3 center">{{$pm->fechafin}}</td>
      <td class="col-xs-3 center">{{$pm->nombre_sede}}</td>
    </tbody>
            @endforeach
  </table>
  </div>
</div>





            </div>
            </div>

            <div class="tab-pane fade" id="Proveedores">
              <div class="container-fluid" id="margenSubmenu">
                <div class="row">
    <div class="col-lg-4 col-lg-offset-2 col-xs-12 ">


      <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control"  type="text" placeholder="Ingrese el nombre*">
      </div>

      <div class="form-group">
         <label for="formGroup">Dirección</label>
          <input class="form-control"  type="text" placeholder="Ingrese el monto acreditado*">
      </div>
      <div class="form-group">
         <label for="formGroup">Monto acreditado</label>
          <input class="form-control"  type="text" placeholder="Ingrese el apellido*">
      </div>
      <div class="form-group">
         <label for="formGroup">Telefono 1</label>
          <input class="form-control"  type="text" placeholder="Ingrese el telefono 1*">
      </div>

  </div>

  <div class="col-lg-4">

 <div class="form-group">
         <label for="formGroup">Telefono 2</label>
          <input class="form-control"  type="text" placeholder="Ingrese el telefono 2*">
      </div>


<div class="form-group">
         <label for="formGroup">Correo electronico</label>
          <input class="form-control"  type="text" placeholder="Ingrese su correo*">
      </div>

<div class="form-group">
         <label for="formGroup">Pagina web</label>
          <input class="form-control"  type="text" placeholder="Ingrese su pagina web*">
      </div>

        <div class="form-group">
                 <label for="formGroup">Fecha de incio</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_ini" id="fecha_ini" placeholder="Ingresa la fecha de inicio" >
            </div>


</div>
</div>



<div class="row">
    <div class="col-xs-12 col-lg-offset-4 col-lg-4" id="fondo">
      <div id="margenbotonAgregar">
        <center><button  id="botonVerde" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Agregar Proveedor
        </button></center>

      </div>

    </div>
</div>



            </div>
            </div>



        </div>

@endsection
