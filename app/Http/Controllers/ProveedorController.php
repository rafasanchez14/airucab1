<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Lugar;
use DB;
use Session;
class ProveedorController extends Controller
{


  public function index()
  {
    $proveedores=DB::select("SELECT p.id_proveedor,p.nombre, p.fechainic, p.montoac, l.nombre_lugar from proveedor p, lugar l where p.id_lugar=l.id_lugar;");
    $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
    return view('portal/airucab-proveedores',compact('lugares','proveedores'));
  }
  public function insertar_proveedor(Request $request)
    {
      $nombre=$request->nombre;
      $parroquia=$request->parroquia;
      $monto=$request->montoac;
      $telefono[]=$request->telefono;
      $correo[]=$request->mail;
      $web[]=$request->web;
      $codarea[]=$request->codarea;
      $fecha=$request->fecha_ini;
      $fecha=date("d/m/Y", strtotime($fecha));
      $idprov=DB::select("SELECT id_proveedor from Proveedor
            order by id_proveedor desc limit 1");
            foreach ($idprov as $key)
            {
              $re=$key->id_proveedor;
            }
            $re=intval($re);
            $re=$re+1;
            DB::insert('INSERT into Proveedor
                       (id_proveedor,nombre,fechainic,id_lugar,montoac)
                        values (?,?,?,?,?)', [$re,$nombre,$fecha,$parroquia,$monto]);
            $correp=$correol[0];
            $web=$web[0];
            $telefono=$telefono[0];
            $codarea=$codarea[0];
            $x=count($telefono);
              $i=0;
              if ($telefono[0]!='') {
            while ($i<$x)
            {
              $codt=DB::select("SELECT cod_telf from telefono
                    order by cod_telf desc limit 1");
                    foreach ($codt as $key)
                    {
                      $ct=$key->cod_telf;
                    }
                    $ct=intval($ct);
                    $ct=$ct+1;
              DB::insert('INSERT INTO telefono
              (cod_telf,cod_area, numerotelf, id_proveedor)
              VALUES (?,?, ?, ?)', [$ct,$codarea[$i],$telefono[$i],$re]);
              $i=$i+1;
            }
          }
            $x=count($web);
              $i=0;
              if ($web[0]!='') {
            while ($i<$x)
            {
              $codw=DB::select("SELECT id_web from web
                    order by id_web desc limit 1");
                    foreach ($codw as $key)
                    {
                      $cw=$key->id_web;
                    }
                    $cw=intval($cw);
                    $cw=$cw+1;
              DB::insert('INSERT INTO web
              (id_web,url,id_proveedor)
              VALUES (?,?, ?)', [$cw,$web[$i],$re]);
              $i=$i+1;
            }
          }
            $x=count($mail);
              $i=0;
              if ($mail[0]!='') {
            while ($i<$x)
            {
              $codc=DB::select("SELECT id_correo from correo
                    order by id_correo desc limit 1");
                    foreach ($codc as $key)
                    {
                      $cc=$key->id_correo;
                    }
                    $cc=intval($cc);
                    $cc=$cc+1;
              DB::insert('INSERT INTO correo
              (id_correo,mail,id_proveedor)
              VALUES (?,?, ?)', [$cc,$mail[$i],$re]);
              $i=$i+1;
            }
          }
          $proveedores=DB::select("SELECT p.id_proveedor,p.nombre, p.fechainic, p.montoac, l.nombre_lugar from proveedor p, lugar l where p.id_lugar=l.id_lugar;");
          $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");

          return view('portal/airucab-proveedores',compact('lugares','proveedores'));
    }
    /*lista todos los proveedores*/
    public function listar_proveedor(){
      $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
      $proveedores=DB::select("SELECT * FROM proveedor");
      return view('portal/airucab-proveedores',compact('lugares'),compact('proveedores'));
    }
    /*consulta proveedores dado un id*/
    public function consultar_proveedor($codproveedor){
      $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
      $proveedores=DB::select("SELECT * FROM proveedor WHERE id_proveedor=$codproveedor");
      return view('portal/airucab-proveedores',compact('lugares'),compact('proveedores'));
    }
    public function consultar_telefono($codproveedor){
      $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
      $telefonop=DB::select("SELECT * FROM telefono WHERE id_proveedor=$codproveedor");
      return view('portal/airucab-proveedores',compact('lugares'),compact('telefonop'));
    }
    public function campo_vacio($dato){
      if ($dato=='') {
        return null;
      }
      return $dato;
    }
    public function edit($id)
    {
        $id_proveedor=$id;

        $lugares=DB::select("SELECT * from Lugar order by nombre_lugar;");

        $proveedores=DB::select("SELECT p.id_proveedor,p.nombre, p.fechainic, p.montoac, l.nombre_lugar from proveedor p, lugar l
          where p.id_lugar=l.id_lugar;");

         $prov=DB::selectOne("SELECT p.id_proveedor,p.nombre, p.fechainic, p.montoac, l.nombre_lugar from proveedor p, lugar l
           where p.id_proveedor=$id_proveedor and p.id_lugar=l.id_lugar;");

         $telefono=DB::select("SELECT cod_telf,cod_area,numerotelf from telefono where id_proveedor=$id_proveedor");

         $correo=DB::select("SELECT id_correo,mail from correo where id_proveedor=$id_proveedor");

         $web=DB::select("SELECT id_web,url from web where id_proveedor=$id_proveedor");

        return view('portal/airucab-proveedoresEdit',compact('lugares','proveedores','prov','telefono','correo','web'));
    }





    public function destroy($id)
    {

    try {

        $data1=array($id);
        DB::delete("DELETE  FROM telefono WHERE id_proveedor = ?",$data1);
        DB::delete("DELETE  FROM correo WHERE id_proveedor = ?",$data1);
        DB::delete("DELETE  FROM web WHERE id_proveedor = ?",$data1);
      DB::delete("DELETE   FROM proveedor WHERE id_proveedor = ?",$data1);
      Session::flash('save','Proveedor eliminado correctamente');
      return redirect('/proveedores');

        }catch (\Illuminate\Database\QueryException $e){
      Session::flash('delete','No es posible eliminar este proveedor');
      return redirect('/proveedores');
        }

    }

    public function buscarP(Request $request)
    {

        $nombre=$request->nombre;

         $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");

         $proveedores=DB::select("SELECT p.id_proveedor,p.nombre, p.fechainic, p.montoac, l.nombre_lugar from proveedor p, lugar l
           where p.nombre like '$nombre%' and p.id_lugar=l.id_lugar;");
       if(count($proveedores) > 0)
        return view('portal/airucab-proveedores',compact('lugares','proveedores'));
        else{
              Session::flash('delete','No se encontraron resultados');
      return redirect('/proveedores');
        }
    }


    public function update(Request $request, $id)
    {

    DB::update("UPDATE proveedor set nombre=?, montoac=?,fechainic=?,id_lugar=?
     WHERE id_proveedor=?",array($request->nombre,$request->montoac,$request->fechainic,$request->id_lugar,$id));
     $telefono[]=$request->telefono;
     $telefono=$telefono[0];
     $codarea[]=$request->codarea;
     $codarea=$codarea[0];
     $mail[]=$request->mail;
     $web[]=$request->web;
     $web=$web[0];
     $r=0;
            // cambio los telefonos
            $codmodifi=DB::select("SELECT cod_telf from telefono where id_proveedor=$id");
            foreach ($codmodifi as $cm ) {
            $codmod[$r]=$cm->cod_telf;
            $r=$r+1;
            }
        $num= count($request->telefono);//telefonos ingresados
        $tbd=DB::select("SELECT count(cod_telf) as cant from telefono where id_proveedor=$id");

        foreach ($tbd as $kt)
        {
          $tb=$kt->cant;
        }
        $tb=intval($tb);
        $r=0;
        $i=0;
        while ($i<$num) {

            $codt=DB::select("SELECT cod_telf from telefono
                  order by cod_telf desc limit 1");
                  foreach ($codt as $key)
                  {
                    $ct=$key->cod_telf;
                  }
                  $ct=intval($ct);
                  $ct=$ct+1;

        if (($telefono[$i]!='')&&($tb>0))
            {
              DB::update('UPDATE telefono set
              cod_area=?, numerotelf=?
              WHERE cod_telf=?; ', array($request->codarea[$i],$request->telefono[$i],$codmod[$r]));
              $tb=$tb-1;
              $r=$r+1;
            }


          if (($telefono[$i]!='')&&($tb==0))
          {
            $codt=DB::select("SELECT cod_telf from telefono
                  order by cod_telf desc limit 1");
                  foreach ($codt as $key)
                  {
                    $ct=$key->cod_telf;
                  }
                  $ct=intval($ct);
                  $ct=$ct+1;
            DB::insert('INSERT INTO telefono
            (cod_telf,cod_area, numerotelf, id_proveedor)
            VALUES (?,?, ?, ?)', [$ct,$codarea[$i],$telefono[$i],$id]);
          }
          $i=$i+1;

        }
        $r=0;


               // cambio la web
               $codmodifi=DB::select("SELECT id_web from web where id_proveedor=$id");
               foreach ($codmodifi as $cm ) {
               $codmod[$r]=$cm->id_web;
               $r=$r+1;
               }
           $num= count($request->web);//telefonos ingresados
           $tbd=DB::select("SELECT count(id_web) as cant from web where id_proveedor=$id");

           foreach ($tbd as $kt)
           {
             $tb=$kt->cant;
           }
           $tb=intval($tb);
           $r=0;
           $i=0;
           while ($i<$num) {

               $codt=DB::select("SELECT id_web from web
                     order by id_web desc limit 1");
                     foreach ($codt as $key)
                     {
                       $ct=$key->id_web;
                     }
                     $ct=intval($ct);
                     $ct=$ct+1;

           if (($web[$i]!='')&&($tb>0))
               {
                 DB::update('UPDATE web set
                   url=?
                 WHERE id_web=?; ', array($request->web[$i],$codmod[$r]));
                 $tb=$tb-1;
                 $r=$r+1;
               }


             if (($web[$i]!='')&&($tb==0))
             {
               $codt=DB::select("SELECT id_web from web
                     order by id_web desc limit 1");
                     foreach ($codt as $key)
                     {
                       $ct=$key->id_web;
                     }
                     $ct=intval($ct);
                     $ct=$ct+1;
               DB::insert('INSERT INTO web
               (id_web,url, id_proveedor)
               VALUES (?,?, ?)', [$ct,$web[$i],$id]);
             }
             $i=$i+1;

           }
           $r=0;


                  // cambio la correo
                  $codmodifi=DB::select("SELECT id_correo from correo where id_proveedor=$id");
                  foreach ($codmodifi as $cm ) {
                  $codmod[$r]=$cm->id_correo;
                  $r=$r+1;
                  }
              $num= count($request->correo);//telefonos ingresados
              $tbd=DB::select("SELECT count(id_correo) as cant from correo where id_proveedor=$id");

              foreach ($tbd as $kt)
              {
                $tb=$kt->cant;
              }
              $tb=intval($tb);
              $r=0;
              $i=0;
              while ($i<$num) {

                  $codt=DB::select("SELECT id_correo from correo
                        order by id_correo desc limit 1");
                        foreach ($codt as $key)
                        {
                          $ct=$key->id_correo;
                        }
                        $ct=intval($ct);
                        $ct=$ct+1;

              if (($correo[$i]!='')&&($tb>0))
                  {
                    DB::update('UPDATE correo set
                      mail=?
                    WHERE id_correo=?; ', array($request->correo[$i],$codmod[$r]));
                    $tb=$tb-1;
                    $r=$r+1;
                  }


                if (($correo[$i]!='')&&($tb==0))
                {
                  $codt=DB::select("SELECT id_correo from correo
                        order by id_correo desc limit 1");
                        foreach ($codt as $key)
                        {
                          $ct=$key->id_correo;
                        }
                        $ct=intval($ct);
                        $ct=$ct+1;
                  DB::insert('INSERT INTO correo
                  (id_correo,mail, id_proveedor)
                  VALUES (?,?, ?)', [$ct,$correo[$i],$id]);
                }
                $i=$i+1;

              }

         Session::flash('save','Proveedor modificado correctamente');
      return redirect('/proveedores');
    }

}
