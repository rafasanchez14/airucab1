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


    public function evo() {



    return view ('report/airucab-Aeronautica');


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

    $producto=DB::select(DB::raw("SELECT m.cod_material as codigo,m.nombre as name ,m.descrip as descri,min(x.cant) as cantidad
                                  from Material m,Inventario x
                                  where m.cod_material=x.cod_material
                                  group by codigo,name,descri
                                  order by cantidad ASC
                                  limit 1;"));

    return view ('report/airucab-producto',compact('producto'));


   }

   public function ala() {

   $alas=DB::select(DB::raw("SELECT p.cod_pieza as codigo ,p.nombre_pieza as pieza,p.desc_pieza as descr,count(*) as cantidad
                             from Avion a, Pieza p, Avion_pieza av
                             where av.cod_pieza=p.cod_pieza AND av.cod_avion=a.cod_avion
                             group by codigo,pieza,descr
                             order by cantidad DESC
                             Limit 1;"));

   return view ('report/airucab-ala',compact('alas'));



   }

   public function prueba(){

   $materiales=DB::select(DB::raw("SELECT m.nombre as name,p.nombre_prueb as prueba,e.nombre_status as estatus
                                from Material_prueba mp,Material m,Prueba p,Estatus e
                                where mp.cod_material=m.cod_material AND mp.cod_prueba=p.cod_prueba AND mp.cod_status=e.id_status AND e.nombre_status='No satisfactorio'
                                group by name,nombre,prueba,estatus;"));

   $cantidad=DB::select(DB::raw("SELECT count(Distinct mp.cod_material) as cantidad
                                 from Material_prueba mp,Material m,Prueba p,Estatus e
                                 where mp.cod_material=m.cod_material AND mp.cod_prueba=p.cod_prueba AND mp.cod_status=e.id_status AND e.nombre_status='No satisfactorio';"));


   $piezas=DB::select(DB::raw("SELECT p.nombre_pieza as name,pr.nombre_prueb as prueba,e.nombre_status as estatus
                               from Pieza_prueba pp,pieza p,Prueba pr,Estatus e
                               where pp.cod_pieza=p.cod_pieza AND pp.cod_prueba=pr.cod_prueba AND pp.id_estatus=e.id_status AND e.nombre_status='No satisfactorio'
                               group by name,prueba,estatus;"));


   $canti=DB::selectone("SELECT count(Distinct pp.cod_pieza) as cant
                             from Pieza_prueba pp,Pieza p,Prueba pr,Estatus e
                             where pp.cod_pieza=p.cod_pieza AND pr.cod_prueba=pp.cod_prueba AND pp.id_estatus=e.id_status AND e.nombre_status='No satisfactorio' ;");




   return view ('report/airucab-cantidad',compact('materiales','cantidad','piezas','canti'));


   }




   public function modelo(){

   $modelos=DB::select(DB::raw( "SELECT *
                                     from modelo
                                     order by id_modelo"));
   return view ('report/airucab-listaM',compact('modelos'));
  }

  public function mejorPlazo()
  {

  $mejorp=DB::select(DB::raw( "SELECT  b.cod_avion as cod_av, b.proav as prom , m.nombre_modelo as modelo from
(SELECT avg(fechafin-fechaini)as proav, cod_avion from ensamb_avion
group by cod_avion order by proav) as b, modelo as m, avion as a
where m.id_modelo=a.id_modelo and a.cod_avion=b.cod_avion  "));
  return view ('report/airucab-listaMejorP',compact('mejorp'));
 }







}
