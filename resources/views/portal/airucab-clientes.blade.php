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
            <li ><a id="Amarillo" href="/registro" >Personal</a></li>
              <li class="" ><a id="Verde" href="/beneficiarios" >Beneficiario</a></li>
            <li class="active" ><a id="Azul" href="/clientes" > Clientes</a></li>
            <li id="margenPregunta"><a id="Verde" href=/proveedores>Proveedores</a></li>
          </ul>
</div>
          <div class="tab-content " >


            <div class="tab-pane fade in active" id="clientes">

            <div class="container-fluid" id="margenSubmenu" >
    {!!Form::open(['route'=>'clientes.store','method'=>'POST'])!!}

                <div class="row">
    <div class="col-lg-4 col-lg-offset-2  " >


      <div class="form-group">
         <label for="formGroup">Nombre</label>
          <input class="form-control" name="nombre_cliente" type="text" placeholder="Ingrese el nombre*">
      </div>
      <div class="form-group">
         <label for="formGroup">Apellido</label>
          <input class="form-control" name="apellido" type="text" placeholder="Ingrese el nombre*">
      </div>

      <div class="form-group">
         <label for="formGroup">pais</label>
         <select  id="pais" class="form-control" required>
            <option value="">Seleccione el pais donde reside</option>
            @foreach($lugares as $lugar)
            <option value="{{$lugar->id_lugar}}">{{$lugar->nombre_lugar}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
         <label for="formGroup">estado</label>
         <select  id="estado" class="form-control" required>
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
         <select name= "id_lugar" id="parroquia" class="form-control" required>
            <option value="">Seleccione la parroquia donde reside</option>
        </select>
      </div>

       <div class="form-group">
         <label for="formGroup">DNI</label>
          <input class="form-control" name="dni" type="text" placeholder="Ingrese el apellido*" required>
      </div>


  </div>

  <div class="col-lg-4">

  <div class="form-group">
         <label for="formGroup">Rif</label>
          <input class="form-control" name="rif" type="text" placeholder="Ingrese el apellido*" required>
      </div>

   <div class="form-group">
         <label for="formGroup">Monto acreditado</label>
          <input class="form-control" name="montoac" type="text" placeholder="Ingrese el apellido*" required>
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
               <input type="text" class="form-control datepicker" name="fechaini" placeholder="Ingrese fecha de inicio*" value="{{ old('fechaini') }}" required>
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


{!!Form::close()!!}
            </div>
            </div>



        </div>
<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">LISTA DE CLIENTES</h2>
     </div>
  </div>

</div>
<div class="container-fluid">
<div class="row">

              <div class="col-lg-3 col-lg-offset-8">
                {!!Form::open(['route'=>'buscarCliente','method'=>'POST','role' => 'search'])!!}
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
          <th>Apellido</th>
          <th>Rif</th>
          <th>Dni</th>
          <th>Monto acreditado</th>
          <th>País</th>
          <th>Estado</th>
          <th>Municipio</th>
          <th>Parroquia</th>
          <th></th>
          <th></th>
        </thead>
        @foreach($clientes as $cliente)
        <tbody class="well">
          <td>{{$cliente->nombre_cliente}}</td>
          <td>{{$cliente->apellido}}</td>
          <td>{{$cliente->rif}}</td>
          <td>{{$cliente->dni}}</td>
          <td>{{$cliente->montoac}}</td>
          <td>{{$cliente->pais}}</td>
          <td>{{$cliente->estado}}</td>
          <td>{{$cliente->municipio}}</td>
          <td>{{$cliente->parroquia}}</td>
          <td>{!!link_to_route('clientes.edit','Editar ',$parameters=$cliente->id_cliente,$attributes=['class'=>'btn btn-success'])!!}
          </td>
          <td>{!!Form::open(['route'=>['clientes.destroy',$cliente->id_cliente],'method'=>'DELETE'])!!}
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


@endsection
