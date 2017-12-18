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
            <li ><a id="Amarillo" href="/registro"  >Personal</a></li>
            <li ><a id="Verde" href="/beneficiarios" >Beneficiario</a></li>
            <li ><a id="Azul" href="/clientes" > Clientes</a></li>
            <li class="active" id="margenPregunta"><a id="Verde" href=/proveedores>Proveedores</a></li>
          </ul>
</div>
          <div class="tab-content " >

            <div class="tab-pane fade in active" id="Proveedores">
              <div class="container-fluid" id="margenSubmenu">
                <div class="row">
      <form  action='/inserta-proveedor'method="post">
{{ csrf_field() }}
          <fieldset>
        <div class="col-lg-4 col-lg-offset-2 col-xs-12 ">
          <div class="form-group">
              <label for="formGroup">Nombre</label>
              <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Ingrese el nombre*">
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
               <label for="formGroup">Monto Acreditado</label>
               {!!Form::text('montoac',null,['class'=>'form-control','placeholder'=>'Ingrese el monto acreditado*','required'])!!}
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
        <center> <button id="botonVerde" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Agregar Proveedor</button></center>
      </fieldset>
      </form>
        </div>
</div>
            </div>
            </div>



        </div>
<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">LISTA DE PROVEEDORES</h2>
     </div>
  </div>

</div>
<div class="container-fluid">
<div class="row">

              <div class="col-lg-3 col-lg-offset-8">
                {!!Form::open(['route'=>'buscarProv','method'=>'POST','role' => 'search'])!!}
               <div class="input-group" >
                {!!Form::text('nombre',null,['id'=>'nombre', 'class'=>'form-control','placeholder'=>'Buscar cliente por nombre','required'])!!}
                <div class="input-group-btn">
                  <button id="buscar" class="btn btn-info" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
                </div>
              </div>
              {!!Form::close()!!}
            </div>
          </div>
          <br>
</div>
<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1 ">
      <table class="table">
        <thead id="botonAzul">
          <th>Nombre</th>
          <th>Monto acreditado</th>
          <th>País</th>
          <th>Fecha inicio</th>
          <th></th>
          <th></th>
        </thead>
        @foreach($proveedores as $prov)
        <tbody class="well">
          <td>{{$prov->nombre}}</td>
          <td>{{$prov->montoac}}</td>
          <td>{{$prov->nombre_lugar}}</td>
          <td>{{$prov->fechainic}}</td>
          <td>{!!link_to_route('proveedores.edit','Editar ',$parameters=$prov->id_proveedor,$attributes=['class'=>'btn btn-success'])!!}
          </td>
          <td>{!!Form::open(['route'=>['proveedores.destroy',$prov->id_proveedor],'method'=>'DELETE'])!!}
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
