@extends('layouts.master')
@section('title','Reportes')
@section('content')
@include('layouts.messages')

<div class="container-fluid">
  <div class="row">
     <div class="col-lg-4 col-lg-offset-1 ">
       <h2 id="margenSubmenu">LISTA DE REPORTES</h2>
     </div>
  </div>

</div>

<div class="container-fluid tabla">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-1 ">
      <table class="table" style="margin-top:3em;">
        <thead id="botonAzul">
          <th>Nombre</th>
          <th class="top:center">Acciones</th>
        </thead>

        <tbody class="well">
           
           <tr>
            <td class="col-xs-3">Producción anual</td>
            <td class="col-xs-1"> <a href => <button type="button" class="btn btn-success" >Generar Reporte </button> </a> </td>
            
           </tr>

           <tr>
            <td class="col-xs-3">Promedio de Producción mensual</td>
            <td class="col-xs-1"> <a href => <button type="button" class="btn btn-success" >Generar Reporte </button> </a> </td>
            
           </tr>

           <tr>
            <td class="col-xs-3">Los mejores 10 clientes en base a la cantidad de compras por año</td>
            <td class="col-xs-1"> <a href='/cliente'> <button type="button" class="btn btn-success" >Generar Reporte </button> </a> </td>
            
           </tr>
           
           <tr>
            <td class="col-xs-3">Evolución de la aeronáutica</td>
            <td class="col-xs-1"> <a href => <button type="button" class="btn btn-success" >Generar Reporte </button> </a> </td>
            
           </tr>
           
           <tr>
            <td class="col-xs-3"> Modelos de aviones</td>
            <td class="col-xs-2"> <a href = "/modelo"> <button type="button" class="btn btn-success" > Generar Reporte </button> </a> </td>
          </tr>
          
          <tr>
            <td class="col-xs-3">Cantidad media de aviones producida mensualmente según el modelo</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar Reporte  </button> </a> </td>
          </tr>

           
          <tr>
            <td class="col-xs-3">El modelo mas vendido</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar Reporte </button> </a> </td>
          </tr>
           
          <tr>
            <td class="col-xs-3">El equipo mas eficiente (en base al menor retraso en sus asignaciones)</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar Reporte </button> </a> </td>
          </tr>


          <tr>
            <td class="col-xs-3">Inventario Mensual</td>
            <td class="col-xs-2"> <a href ='/inv'> <button type="button" class="btn btn-success" > Generar Reporte  </button> </a> </td>
          </tr>
           
          <tr>
            <td class="col-xs-3">Producto mas pedido al inventario</td>
            <td class="col-xs-2"> <a href ='/producto'> <button type="button" class="btn btn-success" > Generar Reporte  </button> </a> </td>
          </tr>

          <tr>
            <td class="col-xs-3">El tipo de alas mas utilizado en los aviones</td>
            <td class="col-xs-2"> <a href ='/ala'> <button type="button" class="btn btn-success" > Generar Reporte  </button> </a> </td>
          </tr>
          <tr>
            <td class="col-xs-3">Cuales fueron los aviones mas rentables en base al cumplimiento de las fechas durante su producción</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar Reporte </button> </a> </td>
          </tr>
          <tr>
            <td class="col-xs-3">Especificaciones de modelo(con el formato del enunciado)</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar Reporte  </button> </a> </td>
          </tr>
          <tr>
            <td class="col-xs-3">Cantidad de productos que no cumplieron con las pruebas de calidad</td>
            <td class="col-xs-2"> <a href = 'prueba'> <button type="button" class="btn btn-success" > Generar Reporte </button> </a> </td>
          </tr>
          <tr>
            <td class="col-xs-3">Promedio de traslados entre las sedes</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar Reporte </button> </a> </td>
          </tr>
     
           <tr>
            <td class="col-xs-3">Lista de proveedores</td>
            <td class="col-xs-1"> <a href ='/prov'> <button type="button" class="btn btn-success" >Generar Reporte  </button> </a> </td>
            
           </tr>

           <tr>
            <td class="col-xs-3">Planta mas eficiente en base al cumplimiento de las fechas</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar Reporte </button> </a> </td>
          </tr>

          <tr>
            <td class="col-xs-3">Descripción de piezas(formato del enunciado)</td>
            <td class="col-xs-2"> <a href = ""> <button type="button" class="btn btn-success" > Generar Reporte  </button> </a> </td>
          </tr>
           
          
       </tbody>

       </table>

    </div>
  </div>

</div>


@endsection
