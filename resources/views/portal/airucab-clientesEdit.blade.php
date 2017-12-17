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
            <li class="active" ><a id="Azul" href="/clientes" > Clientes</a></li>
            <li id="margenPregunta"><a id="Verde" href=/proveedores>Proveedores</a></li>
          </ul>
</div>
          <div class="tab-content " >
            

            <div class="tab-pane fade in active" id="clientes">

            <div class="container-fluid" id="margenSubmenu" >
    
    {!!Form::model($client,['route'=>['clientes.update',$client->id_cliente],'method'=>'PUT'])!!}

                <div class="row">
    <div class="col-lg-4 col-lg-offset-2  " >


      <div class="form-group">
         {!!Form::label('nombre')!!}
          {!!Form::text('nombre_cliente',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre*','required'])!!}
      </div>
      <div class="form-group">
         <label for="formGroup">Apellido</label>
          {!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'Ingrese el apellido*','required'])!!}
      </div>


      <div class="form-group">
                {!! Form::label('País') !!}
                <select class="form-control" 
                id="pais" required>    
        
         @foreach($lugares as $lugar)
         @if(($lugar->tipo_lugar)=='pa')
         @if(($lugar->nombre_lugar)==$client->pais)
                <option value="{{$lugar->id_lugar}}">{{$client->pais}}</option> 
                @endif
                @endif
        @endforeach 

                 @foreach($lugares as $lugar)
                 @if(($lugar->tipo_lugar)=='pa')
                 @if(($lugar->nombre_lugar)!=$client->pais)
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
           @if(($lugar->nombre_lugar)==$client->estado)
                   <option value="{{$lugar->id_lugar}}">{{$client->estado}}</option> 
                   @endif
                   @endif
          @endforeach 
                        @foreach($lugares as $lugar)
                          @if(($lugar->tipo_lugar)=='es')
                            @if(($lugar->nombre_lugar)!=$client->estado)
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
           @if(($lugar->nombre_lugar)==$client->municipio)
                   <option value="{{$lugar->id_lugar}}">{{$client->municipio}}</option> 
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
           @if(($lugar->nombre_lugar)==$client->parroquia)
                   <option value="{{$lugar->id_lugar}}">{{$client->parroquia}}</option> 
                   @endif
                   @endif
          @endforeach 
                         
                  </select>   
        </div> 
     
       <div class="form-group">
         <label for="formGroup">DNI</label>
          {!!Form::text('dni',null,['class'=>'form-control','placeholder'=>'Ingrese el dni*','required'])!!}
      </div>
      

  </div>

  <div class="col-lg-4">

  <div class="form-group">
         <label for="formGroup">Rif</label>
          {!!Form::text('rif',null,['class'=>'form-control','placeholder'=>'Ingrese el rif*','required'])!!}
      </div>

   <div class="form-group">
         <label for="formGroup">Monto acreditado</label>
         {!!Form::text('montoac',null,['class'=>'form-control','placeholder'=>'Ingrese el monto acreditado*','required'])!!}
      </div>

<div class="" id="phones">

            <label for="formGroup-lg">Telefono</label>
               @foreach($telefono as $tel)
             <div class="row">
               <div class="col-xs-4">
                 <div class="form-group">
                          <input class="form-control" value='{{$tel->cod_area}}' onfocus="this.value = (this.value=='{{$tel->cod_area}}') ? '' : this.value" onblur="this.value = (this.value=='') '{{$tel->cod_area}}' ? this.value" name="codarea[]" type="text" placeholder="Cod Area*">
                    </div>
                </div>
                  <div class="col-xs-4">
                    <div class="form-group">
                       <input class="form-control" value='{{$tel->numerotelf}}' onfocus="this.value = (this.value=='{{$tel->numerotelf}}') ? '' : this.value" onblur="this.value = (this.value=='') '{{$tel->numerotelf}}' ? this.value" name="telefono[]" type="text" placeholder="Telefono*">
                    </div>
                  </div>
                  <div class="col-xs-4">

                    <button type="button" class="btn btn-default addButton" onclick="dynamic_phones();" > <i class="fa fa-plus"></i> </button>
                    
                    </div>
                     
            </div>
             @endforeach 
          </div>

 

            <div class="form-group" id="mail">
                  <label for="formGroup">Correo electronico</label>

                @foreach($correo as $mail)
                    <div class="input-group">
                      <input class="form-control" value='{{$mail->mail}}' onfocus="this.value = (this.value=='{{$mail->mail}}') ? '' : this.value" onblur="this.value = (this.value=='') '{{$mail->mail}}' ? this.value" name="mail[]" type="text" placeholder="Ingrese su correo*">
                    <span class="input-group-btn">
                       <button type="button" class="btn btn-default addButton" onclick="dynamic_mail();" > <i class="fa fa-plus"></i> </button>
                    </span>
                  </div>
                  <br>
                @endforeach 
            </div>


        
            <div class="form-group" id="web">
                     <label for="formGroup">Pagina web</label>
                   @foreach($web as $wb)
                    <div class="input-group">
                      <input class="form-control" value='{{$wb->url}}' onfocus="this.value = (this.value=='{{$wb->url}}') ? '' : this.value" onblur="this.value = (this.value=='') '{{$wb->url}}' ? this.value" name="web[]" type="text" placeholder="Ingrese su pagina web*">
                    <span class="input-group-btn">
                       <button type="button" class="btn btn-default addButton" onclick="dynamic_mail();" > <i class="fa fa-plus"></i> </button>
                    </span>
                  </div>
                  <br>
                @endforeach 
            </div>

        <div class="form-group">
                 <label for="formGroup">Fecha de incio</label>
                {!!Form::text('fechaini',null,['class'=>'form-control datepicker','placeholder'=>'Ingresa la fecha de inicio*','required'])!!}
                
            </div>


</div>
</div>



<div class="row">
    <div class="col-xs-12 col-lg-offset-4 col-lg-4" id="fondo">
      <div id="margenSubmenu">
        <center><button id="botonAzul" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Editar Cliente</button></center>

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