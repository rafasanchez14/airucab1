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
            <li class="active" ><a id="Amarillo" href="/personal" >Personal</a></li>
            <li ><a id="Azul" href="/clientes" > Clientes</a></li>
            <li id="margenPregunta"><a id="Verde" href=/proveedores>Proveedores</a></li>
          </ul>
</div>
          <div class="tab-content " >
            <div class="tab-pane fade in active" id="home">

              <div class="container-fluid " id="margenSubmenu">
  <div class="row ">
   {!!Form::open(['route'=>'lugares.store','method'=>'POST'])!!}
    <div class="col-lg-4 col-lg-offset-2 col-xs-12 " id="home">


      <div class="form-group">
         <label for="formGroup">Cedula</label>
          <input class="form-control"  type="text" placeholder="Ingrese la cédula*">
      </div>
      <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control"  type="text" placeholder="Ingrese el nombre*">
      </div>
      <div class="form-group">
         <label for="formGroup">Apellido</label>
          <input class="form-control"  type="text" placeholder="Ingrese el apellido*">
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
      

  </div>

  <div class="col-lg-4"  id="home">

  <div class="form-group">
        <label for="formGroup">Sexo</label>
          <select name= "sexo" id="sexo" class="form-control" required>
            <option value="">Seleccione el sexo</option>
            <option value="Masculino"> Masculino</option>
            <option value="Femenino"> Femenino</option>
        </select>
      </div>

 <div class="form-group">
         <label for="formGroup">Telefono</label>
          <input class="form-control"  type="text" placeholder="Ingrese el telefono*">
      </div>

 <div class="form-group">
         <label for="formGroup">Años de servicio</label>
          <input class="form-control"  type="text" placeholder="Ingrese los años de servicio*">
      </div>

      <div class="form-group">
        <label for="formGroup">Titulación </label>
          <select name= "sexo" id="sexo" class="form-control" required>
            <option value="">Ingrese su nivel de estudio</option>
            <option value="Bachiller"> Bachiller</option>
            <option value="Universitario"> Universitario</option>
        </select>
      </div>
<div class="form-group">
         <label for="formGroup">Correo electronico</label>
          <input class="form-control"  type="text" placeholder="Ingrese su correo*">
      </div>

<div class="form-group">
         <label for="formGroup">Redes Sociales</label>
          <input class="form-control"  type="text" placeholder="Ingrese sus redes socialeslos años de servicio*">
      </div>


</div>
 {!!Form::close()!!} 
</div>



<div class="row">
    <div class="col-xs-12 col-lg-offset-4 col-lg-4" id="fondo">
      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span>  Agregar Personal</button></center>

      </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-lg-offset-2 col-xs-12 " id="home">
    <br><br>
    <label for="formGroup">Agregar experiencia</label>
     <a id="botonAzul"  onclick="experiencia();" class="btn btn-default boton">Experiencia</a>
     <br><br>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4 col-lg-offset-2 col-xs-12 " id="home">

    <label for="formGroup">Agregar beneficiario</label>
     <a id="botonVerde" onclick="beneficiario();" class="btn btn-default  boton">Beneficiario</a>
     <br><br>
    </div>
    </div>

<div class="row">
  <div class="col-lg-4 col-lg-offset-4" >
      <div id="gerente">
        <h3 id="subtitulo">ULTIMA EXPERIENCIA LABORAL</h3>

            <div class="form-group">
         <label for="formGroup">Compañia</label>
          <input class="form-control"  type="text" placeholder="Ingrese nombre de la compañia*">
      </div>

      <div class="form-group">
         <label for="formGroup">Cargo</label>
          <input class="form-control"  type="text" placeholder="Ingrese el cargo*">
      </div>

            <div class="form-group">
                 <label for="formGroup">Fecha de ingreso</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_ini" id="fecha_ini" placeholder="Ingresa la fecha de ingreso" >
            </div>

            <div class="form-group">
                <label for="formGroup">Fecha final</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_fin" id="fecha_fin" placeholder="Ingresa la fecha final" >
            </div>
      </div>
  </div>
</div>

</div>

            </div>

           

        </div>


@endsection