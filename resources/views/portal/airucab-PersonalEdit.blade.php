@extends('layouts.master')

@section('title','Registro')

@section('content')
 @include('layouts.messages')
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
  {!!Form::model($per,['route'=>['registro.update',$per->id_personal],'method'=>'PUT'])!!}
  <div class="row ">
    <div class="col-lg-4 col-lg-offset-2 col-xs-12 " id="home">
      <div class="form-group">
        <div class="form-group">
           {!!Form::label('nombre')!!}
            {!!Form::text('nombre_personal',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre*','required'])!!}
        </div>
      </div>
      <div class="form-group">
        <div class="form-group">
           {!!Form::label('nombre2')!!}
            {!!Form::text('nombre2_personal',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre*','required'])!!}
        </div>
      </div>
      <div class="form-group">
        {!!Form::label('Apellido')!!}
         {!!Form::text('apellido_personal',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre*','required'])!!}
      </div>
      <div class="form-group">
        {!!Form::label('Apellido')!!}
         {!!Form::text('apellido2_personal',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre*','required'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('País') !!}
        <select class="form-control"
        id="pais" required>

 @foreach($lugares as $lugar)
 @if(($lugar->tipo_lugar)=='pa')
 @if(($lugar->nombre_lugar)==$per->pais)
        <option value="{{$lugar->id_lugar}}">{{$per->pais}}</option>
        @endif
        @endif
@endforeach

         @foreach($lugares as $lugar)
         @if(($lugar->tipo_lugar)=='pa')
         @if(($lugar->nombre_lugar)!=$per->pais)
         <option value="{{$lugar->id_lugar}}">{{$lugar->nombre_lugar}}</option>
         @endif
         @endif
         @endforeach
         </select>
      </div>

      <div class="form-group">
        {!! Form::label('Estado') !!}
         <select  class="form-control" id="estado" required>

         @foreach($lugares as $lugar)
     @if(($lugar->tipo_lugar)=='es')
     @if(($lugar->nombre_lugar)==$per->estado)
        <option value="{{$lugar->id_lugar}}">{{$per->estado}}</option>
        @endif
        @endif
     @endforeach
             @foreach($lugares as $lugar)
               @if(($lugar->tipo_lugar)=='es')
                 @if(($lugar->nombre_lugar)!=$per->estado)
                   <option value="{{$lugar->id_lugar}}">{{$lugar->nombre_lugar}}</option>
                 @endif
               @endif
             @endforeach
       </select>
      </div>

      <div class="form-group">
                    {!! Form::label('Municipio') !!}
                     <select  class="form-control" id="municipio" required>

                     @foreach($lugares as $lugar)
            @if(($lugar->tipo_lugar)=='mun')
            @if(($lugar->nombre_lugar)==$per->municipio)
                    <option value="{{$lugar->id_lugar}}">{{$per->municipio}}</option>
                    @endif
                    @endif
           @endforeach

                   </select>
         </div>
      <div class="form-group">
        {!! Form::label('Parroquia') !!}
         <select name= "id_lugar" class="form-control" id="parroquia" required>

         @foreach($lugares as $lugar)
@if(($lugar->tipo_lugar)=='par')
@if(($lugar->nombre_lugar)==$per->parroquia)
        <option value="{{$lugar->id_lugar}}">{{$per->parroquia}}</option>
        @endif
        @endif
@endforeach

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

          <div class="form-group" id="mail">
                <label for="formGroup">Correo electronico</label>
                  <div class="input-group">
                    <input class="form-control" id="mail" name="mail[]" type="text" placeholder="Ingrese su correo*">
                  <span class="input-group-btn">
                     <button type="button" class="btn btn-default addButton" onclick="dynamic_mail();" > <i class="fa fa-plus"></i> </button>
                  </span>
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
  </div>
</div>
<div class="row">
    <div class="col-xs-12 col-lg-offset-4 col-lg-4" id="fondo">
      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span>  Agregar Personal</button></center>

      </div>
      {!!Form::close()!!}
    </div>
</div>

</div>
  <div class="container-fluid tabla">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 ">
        <table class="table">
          <thead id="botonAzul">
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Nombre2</th>
            <th>Apellido</th>
            <th>Apellido2</th>
            <th>Fecha ini</th>
            <th>Fecha fin</th>
            <th>Experiencia</th>
            <th>Titulación</th>
            <th>Sede</th>
            <th>País</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Parroquia</th>
            <th></th>
            <th></th>
          </thead>
          @foreach($personal as $per)
          <tbody class="well">
            <td>{{$per->id_personal}}</td>
            <td>{{$per->nombre_personal}}</td>
            <td>{{$per->nombre2_personal}}</td>
            <td>{{$per->apellido_personal}}</td>
            <td>{{$per->apellido2_personal}}</td>
            <td>{{$per->fechainicio}}</td>
            <td>{{$per->fechafin}}</td>
            <td>{{$per->experiencia}}</td>
            <td>{{$per->titulacion}}</td>
            <td>{{$per->nombre_sede}}</td>
            <td>{{$per->pais}}</td>
            <td>{{$per->estado}}</td>
            <td>{{$per->municipio}}</td>
            <td>{{$per->parroquia}}</td>
            <td>{!!link_to_route('registro.edit','Editar ',$parameters=$per->id_personal,$attributes=['class'=>'btn btn-success'])!!}
            </td>
            <td>{!!Form::open(['route'=>['registro.destroy',$per->id_personal],'method'=>'DELETE'])!!}
              {!!Form::submit('Eliminar',['class'=>'btn btn-danger' ])!!}
              {!!Form::close()!!}   </td>
          </tbody>
          @endforeach
        </table>
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
