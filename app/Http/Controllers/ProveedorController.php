<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Lugar;
use DB;

class ProveedorController extends Controller
{

  public function insertar_proveedor(Request $request)
    {

      $nombre=$request->nombre;
      $parroquia=$request->parroquia;
      $monto=$request->monto;
      $telefono[]=$request->telefono;
      $mail[]=$request->mail;
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
            $mail=$mail[0];
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



            $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
          return view('portal/airucab-proveedores',compact('lugares'));
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
    







}
