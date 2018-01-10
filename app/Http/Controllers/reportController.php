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



    return view ('report/airucab-Reportes');


    }

    public function proveedor(){

    $proveedores=DB::select(DB::raw( "SELECT p.id_proveedor as id,p.nombre,p.fechainic as fecha,p.montoac as monto,l.nombre_lugar as lugar
                                      from Proveedor p,Lugar l, Lugar l1
                                      where p.id_lugar=l.id_lugar
                                      group by id,p.nombre,fecha,monto,lugar;"));



    return view ('report/airucab-listaP',compact('proveedores'));


   }

    public function cliente() {



    $cliente= DB::select(DB::raw(" SELECT c.id_cliente  as id , c.nombre_cliente as cliente,count(a.nro_solicitud)as ordenes
                                   from Avion a, Cliente c, Solicitud s
                                   where a.nro_solicitud=s.nro_solicitud AND c.id_cliente=s.id_cliente AND s.fechasol BETWEEN '2017-01-01'AND '2017-12-31'
                                   group by id
                                   order by ordenes DESC
                                   Limit 10;"));

     return view ('report/airucab-compra',compact('cliente'));

    }

    public function inventario() {

    $inventario=DB::select(DB::raw("SELECT m.cod_material as codigo,i.cant as cantidad,m.nombre as name,s.nombre_sede as sede,i.fechainv as fecha
                                    from Inventario i,Sede s,Material m
                                    where i.cod_material=m.cod_material AND i.cod_sede=s.cod_sede AND i.fechainv BETWEEN '2017-11-01' AND '2017-11-30'
                                    group by codigo,name,cantidad,sede,fecha;"));

    return view ('report/airucab-inventario',compact('inventario'));


   }

    public function producto() {

    $producto=DB::select(DB::raw("SELECT m.cod_material as codigo, m.nombre as name,m.descrip as descri, count(*) cantidad
                                  from Material m,Orden_compra x
                                  where m.cod_material=x.cod_material
                                  group by codigo,name,descri
                                  order by cantidad DESC
                                  Limit 1;"));

    return view ('report/airucab-producto',compact('producto'));


   }


   public function modelo(){

   $modelos=DB::select(DB::raw( "SELECT *
                                     from modelo
                                     order by id_modelo"));
   return view ('report/airucab-listaM',compact('modelos'));
  }

  public function mejorPlazo(){

  $mejorp=DB::select(DB::raw( "SELECT  b.cod_avion as cod_av, b.proav as prom , m.nombre_modelo as modelo from
(SELECT avg(fechafin-fechaini)as proav, cod_avion from ensamb_avion
group by cod_avion order by proav) as b, modelo as m, avion as a
where m.id_modelo=a.id_modelo and a.cod_avion=b.cod_avion  "));
  return view ('report/airucab-listaMejorP',compact('mejorp'));
 }







}
