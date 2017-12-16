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
    <div class="col-lg-4 col-lg-offset-2 col-xs-12 " id="home">

      <form class="" action="/inserta-personal" method="post">
        <div class="form-group">
         <label for="formGroup">Cedula</label>
          <input class="form-control"  name="cedula"type="text" placeholder="Ingrese la cédula*">
      </div>
      <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control"  name="nombre" type="text" placeholder="Ingrese el nombre*">
      </div>
      <div class="form-group">
         <label for="formGroup">Nombre2</label>
          <input class="form-control" name="nombre2" type="text" placeholder="Ingrese el nombre (opcional)">
      </div>
      <div class="form-group">
         <label for="formGroup">Apellido</label>
          <input class="form-control" name="apellido" type="text" placeholder="Ingrese el apellido*">
      </div>
      <div class="form-group">
         <label for="formGroup">Apellido2</label>
          <input class="form-control"  name="apellido2" type="text" placeholder="Ingrese el apellido(opcional)">
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
             <label for="formGroup">Fecha de incio</label>
            <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_ini" id="fecha_ini" placeholder="Ingresa la fecha de inicio" >

        </div>
        <div class="form-group">
                 <label for="formGroup">Fecha de Fin</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_fin" id="fecha_fin" placeholder="Ingresa la fecha de fin" >
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
              </div>
      </div>
    </div>

      <div class="form-group">
        <label for="formGroup">Titulación </label>
          <select name= "titulación" id="titulación" class="form-control" required>
            <option value="">Ingrese su nivel de estudio</option>
            <option value="Bachiller"> Bachiller</option>
            <option value="Universitario"> Universitario</option>
        </select>
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

      <div class="form-group" id="red">
        <label for="formGroup">Red Social</label>
        <div class="row">
          <div class="col-xs-4">
            <div class="form-group">
              <select name= "plataforma" id="plataforma" class="form-control" required>
                <option value="">Red social</option>
                <option value="Facebook"> Facebook</option>
                <option value="Instagram"> Instagram</option>
                <option value="Linkedin"> Linkedin</option>
                <option value="Google+"> Google+</option>
                <option value="Twitter"> Twitter</option>
                <option value="Snapchat"> Snapchat</option>
            </select>
             </div>
              </div>
                   <div class="col-xs-4">
                       <div class="form-group">
                   <input class="form-control"  name="red[]" id="red" type="text" placeholder="User*">
                   </div>
                   </div>
                  <div class="col-xs-4">
                    <button type="button" class="btn btn-default addButton" onclick="dynamic_rs();" > <i class="fa fa-plus"></i> </button>
                  </div>
       </div>
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
      <div id="exper">
        <h3 id="subtitulo">ULTIMA EXPERIENCIA LABORAL</h3>

            <div class="form-group">
         <label for="formGroup">Compañia</label>
          <input class="form-control"  name="comp"type="text" placeholder="Ingrese nombre de la compañia*">
      </div>

      <div class="form-group">
         <label for="formGroup">Cargo</label>
          <input class="form-control"  name="cargo" type="text" placeholder="Ingrese el cargo*">
      </div>

            <div class="form-group">
                 <label for="formGroup">Fecha de ingreso</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_ingr" id="fecha_ini" placeholder="Ingresa la fecha de ingreso" >
            </div>

            <div class="form-group">
                <label for="formGroup">Fecha final</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_final" id="fecha_fin" placeholder="Ingresa la fecha final" >
            </div>
      </div>


      <div id="beneficiario">
        <h3 id="subtitulo">Agregar Beneficiario</h3>

            <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control" name="nombre_bene" type="text" placeholder="Ingrese nombre*">
      </div>

      <div class="form-group">
   <label for="formGroup">Apellido</label>
    <input class="form-control"  name="apellido_bene" type="text" placeholder="Ingrese nombre*">
  </div>

  <div class="form-group">
     <label for="formGroup">pais</label>
     <select name= "pais" id="pais" class="form-control" >
        <option value="">Seleccione el pais donde reside</option>
        @foreach($lugaresb as $lugarb)
        <option value="{{$lugarb->id_lugar}}">{{$lugarb->nombre_lugar}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
     <label for="formGroup">estado</label>
     <select name= "estado" id="estado" class="form-control" >
        <option value="">Seleccione el estado donde reside</option>
    </select>
  </div>
   <div class="form-group">
     <label for="formGroup">Municipio</label>
     <select name= "municipio" id="municipio" class="form-control" >
        <option value="">Seleccione el municipio donde reside</option>
    </select>
  </div>
  <div class="form-group">
     <label for="formGroup">Parroquia</label>
     <select name= "parroquiab" id="parroquia" class="form-control" >
        <option value="">Seleccione la parroquia donde reside</option>
    </select>
  </div>

  <div class="" id="phonesb">

  <label for="formGroup-lg">Telefono</label>
   <div class="row">
     <div class="col-xs-4">
       <div class="form-group">
              <input class="form-control" name="codareab[]" type="text" placeholder="Cod Area*">
          </div>
   </div>
              <div class="col-xs-4">
            <div class="form-group">
                      <input class="form-control"  name="telefonob[]" type="text" placeholder="telefonob*">
                     </div>
              </div>
                      <div class="col-xs-4">
          <button type="button" class="btn btn-default addButton" onclick="dynamic_phonesb();" > <i class="fa fa-plus"></i> </button>
          </div>
  </div>
  </div>

      </div>
  </div>
</div>
<div class="row">
    <div class="col-xs-12 col-lg-offset-4 col-lg-4" id="fondo">
      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span>  Agregar Personal</button></center>
      </form>
      </div>
    </div>
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
                function dynamic_rs() {
                add++;
                var objTo = document.getElementById('red')
                var divtest = document.createElement("div");
                divtest.setAttribute("class", "form-group removeclass"+add);
                var rdiv = 'removeclass'+add;
                divtest.innerHTML = '<div class="form-group" id="red"><div class="row"> <div class="col-xs-4">'+
                '<select name= "plataforma" id="plataforma" class="form-control">'+
                '<option value="">Red social</option> <option value="Facebook"> Facebook</option>'+
                '<option value="Instagram"> Instagram</option>  <option value="Linkedin"> Linkedin</option>'+
                '<option value="Google+"> Google+</option> <option value="Twitter"> Twitter</option>'+
                '<option value="Snapchat"> Snapchat</option></select></div>'+
                '<div class="col-xs-4"><input class="form-control"  name="red[]" id="red" type="text" placeholder="User*">'+
                '</div><div class="col-xs-4"><button type="button" class="btn btn-danger addButton" onclick="remove_dynamic_rs('+add+');" > <i class="fa fa-minus"></i> </button>'+
                '</div></div></div>'
                objTo.appendChild(divtest)
            }

              function remove_dynamic_rs(rid) {
              $('.removeclass'+rid).remove();
            }
          </script>

          <script>
                var add = 1;
                function dynamic_phonesb() {
                add++;
                var objTo = document.getElementById('phonesb')
                var divtest = document.createElement("div");
                divtest.setAttribute("class", "form-group removeclass"+add);
                var rdiv = 'removeclass'+add;
                divtest.innerHTML = '<div class="form-group "> <div class="row"> <div class="col-lg-4"> <input class="form-control" name="codareab[]" type="text" placeholder="Cod Area*"></div>'+
                      ' <div class="col-xs-4"> <input class="form-control" name="telefonob[]" type="text" placeholder="Ingrese el telefonob*">'+
                            ' </div> <div class="col-xs-4"> <button type="button" class="btn btn-danger" onclick="remove_dynamic_phonesb('+ add +');" > <i class="fa fa-minus"></i> </button></span> </div></div> </div>';
                objTo.appendChild(divtest)
            }

              function remove_dynamic_phonesb(rid) {
              $('.removeclass'+rid).remove();
            }
          </script>



        </div>


@endsection
