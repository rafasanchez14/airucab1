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
        $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
    	return view('portal/airucab-registro',compact('lugares'));
    }

    public function clientes()
    {
        $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
        return view('portal/airucab-clientes',compact('lugares'));
    }

    public function proveedores()
    {
        $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
        return view('portal/airucab-proveedores',compact('lugares'));
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
    	return view('portal/airucab-pruebas',compact('sedes','materiales'));
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
