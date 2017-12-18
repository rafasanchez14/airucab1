@extends('layouts.master')
@section('title','pruebas')
@section('content')
@include('layouts.messages')

<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">PRUEBAS</h2>
     </div>
  </div>

</div>

<div class="container margenMenu" id="margenSubmenu">
          <ul class="nav nav-tabs nav-justified ">
            <li ><a id="Azul" href="/pruebascrud" role="tab" data-toggle="tab"> Prueba</a></li>
            <li class="active" ><a id="Amarillo" href="prueba" role="tab" data-toggle="tab">Prueba Material</a></li>
          </ul>
</div>
          <div class="tab-content " >
            <div class="tab-pane fade in active" id="prueba">
              <div class="container-fluid " id="margenSubmenu">
  <div class="row ">
    <div class="col-lg-4 col-lg-offset-4 " id="home">
    {!!Form::model($pru,['route'=>['pruebamat.update',$pru->cod_pruebamat],'method'=>'PUT'])!!}


  <div class="form-group">
               {!! Form::label('Prueba') !!}
                <select name= "id_prueba" class="form-control" id="id_prueba" required>
                @foreach($pruebas as $prueba)
                @if(($prueba->nombre_prueb)==$pru->nombre_prueb)
               <option value="{{$prueba->cod_prueba}}">{{$prueba->nombre_prueb}}</option>
               @endif
      @endforeach
      @foreach($pruebas as $prueba)
      @if(($prueba->nombre_prueb)!=$pru->nombre_prueb)
     <option value="{{$prueba->cod_prueba}}">{{$prueba->nombre_prueb}}</option>
     @endif
@endforeach
              </select>
    </div>


      <div class="form-group">
               <label for="formGroup">Fecha de incio</label>
              {!!Form::text('fechai',null,['class'=>'form-control datepicker','placeholder'=>'Ingresa la fecha de inicio*','required'])!!}

          </div>
          <div class="form-group">
                   <label for="formGroup">Fecha de culminacion</label>
                  {!!Form::text('fechac',null,['class'=>'form-control datepicker','placeholder'=>'Ingresa la fecha de inicio*','required'])!!}

              </div>
              <div class="form-group">
                           {!! Form::label('Material') !!}
                            <select name= "id_material" class="form-control" id="id_material" required>
                            @foreach($materiales as $material)
                            @if(($material->nombre)==$pru->nombre)
                           <option value="{{$material->cod_material}}">{{$material->nombre}}</option>
                           @endif
                  @endforeach
                  @foreach($materiales as $material)
                  @if(($material->nombre)!=$pru->nombre)
                 <option value="{{$material->cod_material}}">{{$material->nombre}}</option>
                 @endif
        @endforeach
                          </select>
                </div>
                <div class="form-group">
                             {!! Form::label('Zona') !!}
                              <select name= "id_zona" class="form-control" id="id_zona" required>
                              @foreach($zonas as $zona)
                              @if(($zona->nombre_zona)==$pru->nombre_zona)
                             <option value="{{$zona->id_zona}}">{{$pru->nombre_zona}}</option>
                             @endif
                             @endforeach
                             @foreach($zonas as $zona)
                             @if(($zona->nombre_zona)!=$pru->nombre_zona)
                            <option value="{{$zona->id_zona}}">{{$zona->nombre_zona}}</option>
                            @endif
                            @endforeach
                            </select>
                  </div>

      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Modificar Prueba</button></center>
{!!Form::close()!!}

</div>

  </div>


</div>

</div>
            </div>

            <div class="container-fluid tabla">
              <div class="row">
                <div class="col-lg-10 col-lg-offset-1 ">
                  <table class="table">
                    <thead id="botonAzul">
                      <th>Codigo</th>
                      <th>Fecha inicio</th>
                      <th>Fecha fin</th>
                      <th>Material</th>
                      <th>Prueba</th>
                      <th>Zona</th>
                      <th>Sede</th>
                      <th></th>
                      <th></th>
                    </thead>
                    @foreach($pruebamat as $prueba)
                    <tbody class="well">
                      <td>{{$prueba->cod_pruebamat}}</td>
                      <td>{{$prueba->fechaini}}</td>
                      <td>{{$prueba->fechafin}}</td>
                      <td>{{$prueba->nombre}}</td>
                      <td>{{$prueba->nombre_prueb}}</td>
                      <td>{{$prueba->nombre_zona}}</td>
                      <td>{{$prueba->nombre_sede}}</td>
                      <td>{!!link_to_route('pruebamat.edit','Editar ',$parameters=$prueba->cod_pruebamat,$attributes=['class'=>'btn btn-success'])!!}
                      </td>
                      <td>{!!Form::open(['route'=>['pruebamat.destroy',$prueba->cod_pruebamat],'method'=>'DELETE'])!!}
                        {!!Form::submit('Eliminar',['class'=>'btn btn-danger' ])!!}
                        {!!Form::close()!!}   </td>
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>



@endsection
