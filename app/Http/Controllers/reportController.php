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



    $cliente= DB::select(DB::raw(" SELECT c.id_cliente  as id , c.nombre_cliente as cliente,count(*)as ordenes
                                   from Pago_Avion a, Cliente c, Orden_compra_cliente o
                                   where a.id_orden_cliente=o.id_orden_cliente AND c.id_cliente=o.id_cliente AND o.fecha BETWEEN '2017-01-01'AND '2017-12-31'
                                   group by id,cliente
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
    
    public function produccion(){

   $produccion=DB::select(DB::raw("SELECT e.cod_ensamav as codigo,e.fechafin as fecha,x.nombre_status as estatus,a.cod_avion as avion
                                   from Ensamb_Avion e,Estatus x, Avion a
                                   where  e.cod_avion=a.cod_avion AND e.id_status=x.id_status AND e.fechafin BETWEEN '2017-01-01' AND '2017-12-31' and x.nombre_status='Finalizado'
                                   group by codigo,fecha,estatus,avion;"));
   
   $cant=DB::select(DB::raw("SELECT count(*) as produccion
                        from Ensamb_Avion e, Estatus x
                        where e.fechafin BETWEEN '2017-01-01' AND '2017-12-31' AND e.id_status=x.id_status AND x.nombre_status='Finalizado';"));
  
  
   return view ('report/airucab-produccion',compact('produccion','cant'));
  
  
  }

  public function model(){

    $model=DB::select(DB::raw("SELECT m.id_modelo as codigo ,m.nombre_modelo as nombre,count(*) as avion
                               from Orden_compra_cliente o, Modelo m, avion a
                               where o.cod_avion=a.cod_avion AND a.id_modelo=m.id_modelo
                               group by codigo,nombre
                               order by avion DESC
                               Limit 1;"));
    
     return view ('report/airucab-model',compact('model'));
    
    
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
 public function piezaform()
 {
 $piezasf=DB::select(DB::raw( "SELECT * From Pieza"));
 return view ('report/airucab-piezaF',compact('piezasf'));
}

  public function promen()

  {
    $promensual=DB::select(DB::raw( "SELECT avg(x.num) as promedio,mes from
    (select count(p.mes) as num, mes from (select (extract(month from m.fec)) as mes
    from (select fechafin as fec, cod_avion from ensamb_avion where id_status=16) as m) as p
    group by mes)x group by mes"));
    return view ('report/airucab-Promensual',compact('promensual'));

  }

  public function equipoef()

  {
    $equi=DB::select(DB::raw( "SELECT p.nombre_personal as nombre ,p.apellido_personal as apellido,e.cod_equipo from personal p, equipo e where p.id_personal=e.cod_personal and cod_equipo in(

select cod_equipo from ensam_pieza where (fechafin-fechainic)= (select min(fechafin-fechainic) as diferencia from ensam_pieza) )"));
    return view ('report/airucab-Equipof',compact('equi'));

  }
  public function sedef()

  {
    $sedef=DB::select(DB::raw( "SELECT p.cod_sede as cod, a.nombre_sede as nombre from personal p, equipo e, sede a where p.cod_sede=a.cod_sede and p.id_personal=e.cod_personal and cod_equipo in(

select cod_equipo from ensam_pieza where (fechafin-fechainic)= (select min(fechafin-fechainic) as diferencia from ensam_pieza) )"));
    return view ('report/airucab-Sedef',compact('sedef'));

  }







}
