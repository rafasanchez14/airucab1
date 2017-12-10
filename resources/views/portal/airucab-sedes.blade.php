@extends('layouts.master')

@section('title','Sedes')

@section('content')
<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">SEDES</h2>
     </div>
  </div>
  
</div>
<div class="container margenMenu" id="margenSubmenu">
          <ul class="nav nav-tabs nav-justified ">
            <li class="active" ><a id="Amarillo" href="#home" role="tab" data-toggle="tab">Registrar Materiales</a></li>   
            <li ><a id="Azul" href="#Consultar" role="tab" data-toggle="tab"> Consultar Materiales</a></li>
            <li id="margenPregunta"><a id="Verde" href="#Distribucion" role="tab" data-toggle="tab">Distribucion En Sede</a></li>
          </ul>
</div>
          <div class="tab-content " >
            <div class="tab-pane fade in active" id="home">  

              <div class="container-fluid " id="margenSubmenu">
  <div class="row ">
    <div class="col-lg-4 col-lg-offset-2 col-xs-12 " id="home">

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
        <label for="formGroup">Sede </label>
          <select name= "sede" id="sede" class="form-control" required>
            <option value="">Ingrese la sede</option>
            @foreach($sedes as $sede) 
            <option value="{{$sede->cod_sede}}">{{$sede->nombre_sede}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
         <label for="formGroup">Cantidad</label>
          <input class="form-control"  type="text" placeholder="Ingrese la cantidad*">
      </div>    

  </div>

  <div class="col-lg-4"  id="home">

 <div class="form-group">
         <label for="formGroup">Tiempo estimado de construccion</label>
          <input class="form-control"  type="text" placeholder="Ingrese el umero de dias*">
      </div>  

 <div class="form-group">
         <label for="formGroup">Tiempo estimado de embalaje</label>
          <input class="form-control"  type="text" placeholder="Ingrese el umero de dias*">
      </div> 
<div class="form-group">
                 <label for="formGroup">Fecha de llegada</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_ini" id="fecha_ini" placeholder="Ingresa la fecha de inicio" >
            </div>
      



</div>
</div>



<div class="row">
    <div class="col-xs-12 col-lg-offset-4 col-lg-4" id="fondo">
      <div id="margenSubmenu">
        <center><button id="botonAmarillo" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span>  Agregar Personal</button></center> 
       
      </div>
    </div>
</div>

</div>

            </div>

            <div class="tab-pane fade " id="Consultar">
            <div class="container" id="margenSubmenu" >

<div class="row" >
  <div class="col-lg-4 col-lg-offset-8 col-xs-10 col-xs-offset-1">
    <div class="input-group" >
      <input type="text" class="form-control" placeholder="Buscar por nombre">
      <span class="input-group-btn ">
        <button class="btn btn-info" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
    
      </span>
    </div>
  </div>
</div>
             <div class="table-responsive" id="margenSubmenu">
  <div id="height">
  <table class="table table-fixed">             
    <thead id="textColor">       
    <th class="col-xs-3">NOMBRE</th>         
        <th class="col-xs-2">SEDE</th>
        <th class="col-xs-2 center">CANTIDAD</th>
        <th class="col-xs-2 center">ESTATUS</th>
         <th class="col-xs-4 center">TIEMPO DE CONSTRUCCIÓN</th>     
    </thead>        

    <tbody id="margenPregunta">
    <td class="col-xs-3">Tornillos</td>  
    <td class="col-xs-2">Maracay</td> 
      <td class="col-xs-2 center">500 unidades</td> 
      <td class="col-xs-2 center">En proceso </td> 
      <td class="col-xs-4 center">15 dias </td>
     
     

    </tbody>  
  </table>
  </div>
</div>



                
  
            </div>
            </div>

            <div class="tab-pane fade" id="Distribucion">
              <div class="container-fluid" id="margenSubmenu">
                <div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-xs-12 ">

  
      <div class="form-group">
        <label for="formGroup">Sede </label>
          <select name= "sede" id="sede" class="form-control" required>
            <option value="">Ingrese la sede</option>
            @foreach($sedes as $sede) 
            <option value="{{$sede->cod_sede}}">{{$sede->nombre_sede}}</option>
          @endforeach
        </select>
      </div>
      
        <div class="form-group">
        <label for="formGroup">Pieza </label>
          <select name= "sexo" id="sexo" class="form-control" required>
            <option value="">Ingrese la pieza</option>
            <option value=""> </option>
            <option value=""> </option>
        </select>
      </div>
        <div class="form-group">
        <label for="formGroup">Área </label>
          <select name= "sexo" id="sexo" class="form-control" required>
            <option value="">Ingrese el área</option>
            <option value=""> </option>
            <option value=""> </option>
        </select>
      </div>

      <div class="form-group">
                 <label for="formGroup">Fecha de distribucion</label>
                <input type="date" class="form-control" step="1" min="1940-01-01" max="2017-30-06" name="fecha_ini" id="fecha_ini" placeholder="Ingresa la fecha de inicio" >
            </div>
      

  </div>

</div>



<div class="row">
    <div class="col-xs-12 col-lg-offset-4 col-lg-4" id="fondo">
      <div id="margenSubmenu">
        <center><button id="botonVerde" type="submit" class="btn btn-default btn-block btn-lg"><span  class="fa fa-upload" aria-hidden="true"></span> Registrar</button></center> 
       
      </div>
    </div>
</div>

                
  
            </div>
            </div>
        </div>
@endsection