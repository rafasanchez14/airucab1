<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Lugar;
use DB;

class VistaController extends Controller
{

    public function inicio()
    {
    return view('portal/airucab-inicio');
    }
    public function registro()
    {
       $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");
        $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
        $lugaresb=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
    	return view('portal/airucab-registro',compact('lugares','sedes','lugaresb'));
    }

    public function beneficiarios()
    {
      $personal=DB::select("SELECT id_personal, id_personal||' '||nombre_personal||' '||apellido_personal as perso from personal;");
      $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");
       $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
     return view('portal/airucab-beneficiario',compact('lugares','sedes','personal'));
    }


    public function clientes()
    {
        $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
        return view('portal/airucab-clientes',compact('lugares'));
    }

    public function proveedores()
    {
      $proveedores=DB::select("SELECT p.id_proveedor,p.nombre, p.fechainic, p.montoac, l.nombre_lugar from proveedor p, lugar l
        where p.id_lugar=l.id_lugar");
        $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
        return view('portal/airucab-proveedores',compact('lugares','proveedores'));
    }

    public function sedes()
    {
         $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");
        $materiales=DB::select("SELECT nombre,cod_material FROM material  order by nombre;");
    	return view('portal/airucab-sedes',compact('sedes','materiales'));
    }
    public function pruebas()
    {
        $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");
        $materiales=DB::select("SELECT nombre,cod_material FROM material  order by nombre;");
        $pruebas=DB::select("SELECT nombre_prueb,cod_prueba FROM Prueba order by nombre_prueb;");
        $pruebamat=DB::select("SELECT  p.cod_pruebamat,p.fechafin, m.nombre, pp.nombre_prueb , z.nombre_zona, s.nombre_sede
          from material m, prueba pp, material_prueba p, zona z, sede s
          where pp.cod_prueba=p.cod_prueba and m.cod_material=p.cod_material and p.id_zona=z.id_zona and s.cod_sede=z.cod_sede");
      return view('portal/airucab-pruebas',compact('sedes','materiales','pruebas','pruebamat'));
    }
    public function materiaPrima()
    {
        $proveedores=DB::select("SELECT nombre,id_proveedor FROM proveedor  order by nombre;");
        $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");

    	return view('portal/airucab-materiaPrima',compact('proveedores','sedes'));
    }
    public function diseñoAvion()
    {
    	return view('portal/airucab-dAvion');
    }
    public function buscarEstados($idLugar)
    {
     return $lugares=DB::select("SELECT nombre_lugar,id_lugar from lugar where lugar_per=$idLugar and tipo_lugar='es'");
    }

    public function buscarMunicipios($idLugar)
    {
     return $lugares=DB::select("SELECT nombre_lugar,id_lugar from lugar where lugar_per=$idLugar and tipo_lugar='mun'");
    }

    public function buscarParroquias($idLugar)
    {
     return $lugares=DB::select("SELECT nombre_lugar,id_lugar from lugar where lugar_per=$idLugar and tipo_lugar='par'");
    }


}
