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
            <li ><a id="Amarillo" href="/registro"  >Personal</a></li>
            <li ><a id="Azul" href="/clientes" > Clientes</a></li>
            <li class="active" id="margenPregunta"><a id="Verde" href=/proveedores>Proveedores</a></li>
          </ul>
</div>
          <div class="tab-content " >

            <div class="tab-pane fade in active" id="Proveedores">
              <div class="container-fluid" id="margenSubmenu">
                <div class="row">
    <div class="col-lg-4 col-lg-offset-2 col-xs-12 ">


      <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control"  type="text" placeholder="Ingrese el nombre*">
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
         <label for="formGroup">Monto acreditado</label>
          <input class="form-control"  type="text" placeholder="Ingrese el apellido*">
      </div>





  </div>

  <div class="col-lg-4">

        <form id="bookForm" method="post" class="l">
          <form method="post" action="">
          <div id="newlink">
  <div class="form-group">
           <label for="formGroup">Telefono</label>
           <div class="row">
           <div class="col-md-6">
          <input class="form-control"  type="text" placeholder="Cod Area*">
           </div>
           <div class="col-md-6">
          <input class="form-control"  type="text" placeholder="telefono*">
           </div>
           </div>
        </div>
</div>

<p id="addnew">


    <button type="button" onclick="new_link()"class="btn btn-default"><i class="fa fa-plus"></i></button>
</p>
</form>
<!-- Template -->
<div id="newlinktpl" style="display:none">
    <div class="form-group">
             <label for="formGroup">Telefono</label>
             <div class="row">
             <div class="col-md-6">
            <input class="form-control"  type="text" placeholder="Cod Area*">
             </div>
             <div class="col-md-6">
            <input class="form-control"  type="text" placeholder="telefono*">
             </div>
             </div>
          </div>
</div>
    </form>

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
      <div id="margenSubmenu">
        <center><button id="botonVerde" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Agregar Proveedor</button></center>

      </div>
    </div>
</div>
            </div>
            </div>
            <script>/* para botones dinamicos*/
            var ct = 1;
            function new_link()
            {
            	ct++;
            	var div1 = document.createElement('div');
            	div1.id = ct;
            	// link to delete extended form elements
            	var delLink = '<div style="text-align:right;"> <button  type="button" onclick="deletet('+ct+')"class="btn btn-default"><i class="fa fa-minus"></i></button> </div>';
            	div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
            	document.getElementById('newlink').appendChild(div1);
            }
            // function to delete the newly added set of elements
            function deletet(eleId)
            {
            	d = document;
            	var ele = d.getElementById(eleId);
            	var parentEle = d.getElementById('newlink');
            	parentEle.removeChild(ele);
            }
            </script>
        </div>



@endsection
