<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Lugar;
use DB;

class PersonalController extends Controller
{


public function insertar_pers(Request $request){
  $cedula=$request->cedula;
  $nombre=$request->nombre;
  $nombre2=$request->nombre2;
  $apellido=$request->apellido;
  $apellido2=$request->apellido2;
  $sede=$request->sede;
  $titulacion=$request->titulación;
  $codarea[]=$request->codarea;
  $telefono[]=$request->telefono;
  $mail[]=$request->mail;
  $reds[]=$request->red;
  $plataforma[]=$request->plataforma;
  $parroquia=$request->parroquia;
  $fechac=$request->fecha_ini;
  $fechai=$request->fecha_fin;
  $fechac=date("d/m/Y", strtotime($fechac));
  $fechai=date("d/m/Y", strtotime($fechai));
  /*experiencia*/
      $comp=$request->comp;
      $cargo=$request->cargo;
      $fechac=$request->fecha_ingr;
      $fechai=$request->fecha_final;
      $fechaingr=date("d/m/Y", strtotime($fechac));
      $fecha_final=date("d/m/Y", strtotime($fechai));
      /*experiencia*/

  /*Beneficiario*/

/*beneficiario*/

  $mail=$mail[0];
  $telefono=$telefono[0];
  $codarea=$codarea[0];
  $reds=$reds[0];
  $experiencia="trabajo en ".$comp." durante ".$fechaingr." ".$fecha_final." como ".$cargo;
    DB::insert('INSERT INTO personal(
            id_personal, nombre_personal, apellido_personal, nombre2_personal,
            apellido2_personal, titulacion, fechainicio, fechafin, experiencia,
            id_lugar, cod_sede)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
    [$cedula,$nombre,$apellido,$nombre2,$apellido2,$titulacion,$fechai,$fechac,$experiencia,$parroquia,$sede]);

/*Inserto telefonos*/
    $i=0;
    $x=count($telefono);
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
    (cod_telf,cod_area, numerotelf, cod_personal)
    VALUES (?,?, ?, ?)', [$ct,$codarea[$i],$telefono[$i],$cedula]);
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
      (id_correo,mail,cod_personal)
      VALUES (?,?, ?)', [$cc,$mail[$i],$cedula]);
      $i=$i+1;
    }

  }

  $i=0;
  if ($reds[0]!='') {
while ($i<$x)
{
  $codt=DB::select("SELECT id_redsocial from red_social
        order by id_redsocial desc limit 1");
        foreach ($codt as $key)
        {
          $ct=$key->id_redsocial;
        }
        $ct=intval($ct);
        $ct=$ct+1;

  DB::insert('INSERT INTO red_social
  (id_redsocial,plataforma, usuario, cod_personal)
  VALUES (?,?, ?, ?)', [$ct,$plataforma[$i],$reds[$i],$cedula]);
  $i=$i+1;
}
  }
  $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");
   $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
   $lugaresb=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
 return view('portal/airucab-registro',compact('lugares','sedes','lugaresb'));

}

public function insertar_bene(Request $request)
{
  $cedula=$request->cedula;
  $nombre_bene=$request->nombre_bene;
  $apellido_bene=$request->apellido_bene;
  $telefono[]=$request->telefono;
  $parroquia=$request->parroquia;
  $codarea[]=$request->codarea;
  $personal=$request->perso;
  $telefono=$telefono[0];
  $codarea=$codarea[0];
  DB::insert('INSERT INTO beneficiario(
            id_bene, nombre_bene, apelldido_bene, id_lugar, cod_personal)
    VALUES (?, ?, ?, ?, ?)',[$cedula,$nombre_bene,$apellido_bene,$parroquia,$personal]);
    $i=0;
    $x=count($telefono);
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
            (cod_telf,cod_area, numerotelf, id_bene)
            VALUES (?,?, ?, ?)', [$ct,$codarea[$i],$telefono[$i],$cedula]);
            $i=$i+1;
        }
    }

    $personal=DB::select("SELECT id_personal, id_personal||' '||nombre_personal||' '||apellido_personal as perso from personal;");
    $sedes=DB::select("SELECT nombre_sede,cod_sede FROM sede  order by nombre_sede;");
     $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
   return view('portal/airucab-beneficiario',compact('lugares','sedes','personal'));
  }




}
