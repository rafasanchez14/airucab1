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
               <label for="formGroup">Fecha de incio</label>
             <input type="text" class="form-control datepicker" name="fechai" placeholder="Ingrese fecha de inicio*" value="{{ old('fechaini') }}" required>
          </div>
          <div class="form-group">
                   <label for="formGroup">Fecha de culminacion</label>
                 <input type="text" class="form-control datepicker" name="fechac" placeholder="Ingrese fecha de culminacion*" value="{{ old('fechaini') }}" required>
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
        <label for="formGroup">Zona </label>
          <select name= "zona" id="zona" class="form-control" required>
            <option value="">Ingrese la Zona</option>
            @foreach($zonas as $zona)
            <option value="{{$zona->id_zona}}">{{$zona->nombre}}</option>
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
