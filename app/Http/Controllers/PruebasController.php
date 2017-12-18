<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Lugar;
use DB;
use Session;

class PruebasController extends Controller
{

public function insertar_matp(Request $request)
  {
    $material=$request->material;
    $zona=$request->zona;
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
          DB::insert('INSERT into Material_Prueba
               (cod_pruebamat,fechaini,fechafin,cod_material,cod_prueba,id_zona)
                values (?,?,?,?,?,?)', [$re,$fechai,$fechac,$material,$prueba,$zona]);

                    Session::flash('save','Agregado correctamente');
                    return redirect('/pruebas');

    }

    public function buscarMP(Request $request){

       $clavemp = $request->clave;
      $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");
      $materiales=DB::select("SELECT nombre,cod_material FROM material  order by nombre;");
      $pruebas=DB::select("SELECT nombre_prueb,cod_prueba FROM Prueba order by nombre_prueb;");
      $pruebamat=DB::select("SELECT  p.cod_pruebamat,p.fechafin, m.nombre, pp.nombre_prueb , z.nombre_zona, s.nombre_sede
        from material m, prueba pp, material_prueba p, zona z, sede s
        where pp.cod_prueba=p.cod_prueba and m.cod_material=p.cod_material and p.id_zona=z.id_zona and s.cod_sede=z.cod_sede and pp.nombre_prueb like'%$clavemp%'");
        return view('portal/airucab-pruebas',compact('sedes','materiales','pruebas','pruebamat'));
    }

    public function edit($id)
    {
        $cod_pruebamat=$id;
        $zonas=DB::select("SELECT a.id_zona, a.nombre_zona from zona a order by nombre_zona;");
        $materiales=DB::select("SELECT nombre,cod_material FROM material  order by nombre;");
        $pruebas=DB::select("SELECT nombre_prueb,cod_prueba FROM Prueba order by nombre_prueb;");
        $pruebamat=DB::select("SELECT  p.cod_pruebamat,p.fechaini,p.fechafin, m.nombre, pp.nombre_prueb , z.nombre_zona, s.nombre_sede
          from material m, prueba pp, material_prueba p, zona z, sede s
          where pp.cod_prueba=p.cod_prueba and m.cod_material=p.cod_material and p.id_zona=z.id_zona and s.cod_sede=z.cod_sede");
          $pru=DB::selectOne("SELECT  p.cod_pruebamat,p.fechaini,p.fechafin, m.nombre, pp.nombre_prueb , z.nombre_zona, s.nombre_sede
            from material m, prueba pp, material_prueba p, zona z, sede s
            where pp.cod_prueba=p.cod_prueba and m.cod_material=p.cod_material and p.id_zona=z.id_zona and s.cod_sede=z.cod_sede and cod_pruebamat=$cod_pruebamat");
      return view('portal/airucab-pruebasEdit',compact('zonas','materiales','pruebas','pruebamat','pru'));

    }
    public function update(Request $request, $id)
    {
        DB:: update('UPDATE material_prueba
         SET  fechaini=?, fechafin=?, cod_material=?, id_zona=?,
             cod_prueba=? WHERE cod_pruebamat=?',array($request->fechai,$request->fechac,$request->id_material,$request->id_zona,$request->id_prueba,$id));
             Session::flash('save','Prueba Material Modificado correctamente');
             return redirect('/pruebas');
    }
    public function destroy($id)
    {
    try {
        $data1=array($id);
          DB::DELETE("DELETE FROM material_prueba WHERE cod_pruebamat=?",$data1);

      Session::flash('save','Prueba Material eliminado correctamente');
      return redirect('/pruebas');

        }catch (\Illuminate\Database\QueryException $e){
            Session::flash('delete','No es posible eliminar esta Prueba Material');
      return redirect('/pruebas');
        }

    }




}
