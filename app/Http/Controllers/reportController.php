<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;


class reportController extends Controller
{
    
    public function index() {

       
   
    return view ('portal/airucab-Reportes');
   
   
    }

    public function proveedor(){

    $proveedores=DB::select(DB::raw( "SELECT p.id_proveedor as id,p.nombre,p.fechainic as fecha,p.montoac as monto,l.nombre_lugar as lugar
                                      from Proveedor p,Lugar l, Lugar l1
                                      where p.id_lugar=l.id_lugar 
                                      group by id,p.nombre,fecha,monto,lugar;"));
    
    
     
    return view ('portal/airucab-listaP',compact('proveedores'));

    
   }





}
