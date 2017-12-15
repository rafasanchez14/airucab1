<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Lugar;
use DB;

class PruebasController extends Controller
{

public function insertar_matp(Request $request)
  {
    $material=$request->material;
    $prueba=$request->prueba;
    $fechac=$request->fecha_c;
    $fechai=$request->fecha_i;
    $fechac=date("d/m/Y", strtotime($fechac));
    $fechai=date("d/m/Y", strtotime($fechai));

    $idmatp=DB::select("SELECT cod_pruebamat from Material_Prueba
          order by cod_pruebamat desc limit 1");

          foreach ($idmatp as $key)
          {
            $re=$key->cod_pruebamat;
          }
          $re=intval($re);
          $re=$re+1;
/*fecha por defecto*/
          if ($fechac!='31/12/1969') {


          DB::insert('INSERT into Material_Prueba
               (cod_pruebamat,fechaini,fechafin,cod_material,cod_prueba)
                values (?,?,?,?,?)', [$re,$fechai,$fechac,$material,$prueba]);
              }

              if ($fechac=='31/12/1969') {
              DB::insert('INSERT into Material_Prueba
                   (cod_pruebamat,fechaini,cod_material,cod_prueba)
                    values (?,?,?,?)', [$re,$fechai,$material,$prueba]);
                  }

                  

                  $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");
                  $materiales=DB::select("SELECT nombre,cod_material FROM material  order by nombre;");
                  $pruebas=DB::select("SELECT nombre_prueb,cod_prueba FROM Prueba order by nombre_prueb;");
              	return view('portal/airucab-pruebas',compact('sedes','materiales','pruebas'));
    }




}
