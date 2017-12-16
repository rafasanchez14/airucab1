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
    <li class="" ><a id="Azul" href="/beneficiarios" >Beneficiario</a></li>
    <li class="active"><a id="Azul" href="/clientes" > Clientes</a></li>
    <li id="margenPregunta"><a id="Verde" href=/proveedores>Proveedores</a></li>
  </ul>
</div>
          <div class="tab-content " >


            <div class="tab-pane fade in active" id="clientes">

            <div class="container-fluid" id="margenSubmenu" >
                <div class="row">

                  <form  action='/inserta-cliente'method="post">
            {{ csrf_field() }}
                      <fieldset>
    <div class="col-lg-4 col-lg-offset-2  " >

    <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control"  name="nombre" type="text" placeholder="Ingrese el nombre*">
      </div>

      <div class="form-group">
         <label for="formGroup">Apellido</label>
          <input class="form-control"  name="apellido" type="text" placeholder="Ingrese el apellido*">
      </div>

      <div class="form-group">
         <label for="formGroup">DNI</label>
          <input class="form-control"  name="id" type="text" placeholder="Ingrese su DNI*">
      </div>

      <div class="form-group">
         <label for="formGroup">RIF</label>
          <input class="form-control"  name="rif" type="text" placeholder="Ingrese el rif*">
      </div>


      <div class="form-group">
         <label for="formGroup">pais</label>
         <select name= "lugar" id="pais" class="form-control" required>
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
          <input class="form-control"  name="monto" type="text" placeholder="Ingrese el apellido*">
      </div>


  </div>

  <div class="col-lg-4">

          <div id="newlink">
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
                                <input class="form-control"  name="telefono[]" type="text" placeholder="Telefono*">
                               </div>
                        </div>
                                <div class="col-xs-4">

                    <button type="button" class="btn btn-default addButton" onclick="dynamic_phones();" > <i class="fa fa-plus"></i> </button>
                    </span>
                    </div>
            </div>
          </div>
            </div>



            <div class="form-group" id="mail">
                  <label for="formGroup">Correo electronico</label>
                    <div class="input-group">
                      <input class="form-control" id="mail" name="mail[]" type="text" placeholder="Ingrese su correo*">
                    <span class="input-group-btn">
                       <button type="button" class="btn btn-default addButton" onclick="dynamic_mail();" > <i class="fa fa-plus"></i> </button>
                    </span>
                  </div>
            </div>

            <div class="form-group" id="web">
                     <label for="formGroup">Pagina web</label>
                     <div class="input-group">
                      <input class="form-control"  name="web[]" id="web" type="text" placeholder="Ingrese su pagina web*">
                        <span class="input-group-btn">
                       <button type="button" class="btn btn-default addButton" onclick="dynamic_web();" > <i class="fa fa-plus"></i> </button>
                      </span>
                  </div>
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
        <center><button id="botonAzul" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Agregar Cliente</button></center>

      </div>
    </div>
</div>

</fieldset>
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


         <script>
              var add = 1;
              function dynamic_mail() {
              add++;
              var objTo = document.getElementById('mail')
              var divtest = document.createElement("div");
              divtest.setAttribute("class", "form-group removeclass"+add);
              var rdiv = 'removeclass'+add;
              divtest.innerHTML = '<div class="form-group "> <label for="formGroup">Correo electronico</label> <div class="input-group">  <input class="form-control"  name="mail[]" type="text" placeholder="Ingrese su correo *"> <span class="input-group-btn"> <button type="button" class="btn btn-danger" onclick="remove_dynamic_mail('+ add +');" > <i class="fa fa-minus"></i> </button>  </span> </div></div>';
              objTo.appendChild(divtest)
          }

            function remove_dynamic_mail(rid) {
            $('.removeclass'+rid).remove();
          }
        </script>


         <script>
              var add = 1;
              function dynamic_web() {
              add++;
              var objTo = document.getElementById('web')
              var divtest = document.createElement("div");
              divtest.setAttribute("class", "form-group removeclass"+add);
              var rdiv = 'removeclass'+add;
              divtest.innerHTML = '<div class="form-group "> <label for="formGroup">Pagina web</label> <div class="input-group">  <input class="form-control" name="web[]" type="text" placeholder="Ingrese su pagina web *"> <span class="input-group-btn"> <button type="button" class="btn btn-danger" onclick="remove_dynamic_web('+ add +');" > <i class="fa fa-minus"></i> </button>  </span> </div></div>';
              objTo.appendChild(divtest)
          }

            function remove_dynamic_web(rid) {
            $('.removeclass'+rid).remove();
          }
        </script>


    </div>






@endsection
