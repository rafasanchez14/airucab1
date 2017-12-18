<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Lugar;
use DB;
use Session;
class BeneController extends Controller
{

  public function index()
  {
      $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");
       $beneficiarios=DB::select("SELECT beneficiario.id_bene,beneficiario.nombre_bene,beneficiario.apelldido_bene,personal.id_personal||' '||personal.nombre_personal||' '||personal.apellido_personal as perso , l1.nombre_lugar as parroquia,l2.nombre_lugar as municipio,l3.nombre_lugar as estado,l4.nombre_lugar as pais from beneficiario,personal,lugar l1,lugar l2,lugar l3,lugar l4 where beneficiario.id_lugar=l1.id_lugar and (l1.lugar_per=l2.id_lugar) and (l2.lugar_per=l3.id_Lugar) and (l3.lugar_per=l4.id_Lugar) and (beneficiario.cod_personal= personal.id_personal);");
       $personal=DB::select("SELECT id_personal, id_personal||' '||nombre_personal||' '||apellido_personal as perso from personal;");
      return view('portal/airucab-clientes',compact('lugares','clientes','personal','beneficiarios'));

  }
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


  public function edit($id)
  {
      $id_bene=$id;
      $lugares=DB::select("SELECT * from Lugar order by nombre_lugar;");
      $beneficiarios=DB::select("SELECT beneficiario.id_bene,beneficiario.nombre_bene,beneficiario.apelldido_bene,personal.id_personal||' '||personal.nombre_personal||' '||personal.apellido_personal as perso , l1.nombre_lugar as parroquia,l2.nombre_lugar as municipio,l3.nombre_lugar as estado,l4.nombre_lugar as pais from beneficiario,personal,lugar l1,lugar l2,lugar l3,lugar l4 where beneficiario.id_lugar=l1.id_lugar and (l1.lugar_per=l2.id_lugar) and (l2.lugar_per=l3.id_Lugar) and (l3.lugar_per=l4.id_Lugar) and (beneficiario.cod_personal= personal.id_personal);");
       $bene=DB::selectOne("SELECT beneficiario.id_bene,beneficiario.nombre_bene,beneficiario.apelldido_bene,personal.id_personal||' '||personal.nombre_personal||' '||personal.apellido_personal as perso , l1.nombre_lugar as parroquia,l2.nombre_lugar as municipio,l3.nombre_lugar as estado,l4.nombre_lugar as pais from beneficiario,personal,lugar l1,lugar l2,lugar l3,lugar l4 where beneficiario.id_lugar=l1.id_lugar and (l1.lugar_per=l2.id_lugar) and (l2.lugar_per=l3.id_Lugar) and (l3.lugar_per=l4.id_Lugar) and (beneficiario.cod_personal= personal.id_personal)and (beneficiario.id_bene=$id_bene);");
       $telefono=DB::select("SELECT cod_telf,cod_area,numerotelf from telefono where id_bene=$id_bene");

  return view('portal/airucab-beneficiariosEdit',compact('lugares','beneficiarios','bene','telefono'));
  }

  public function update(Request $request, $id)
  {
    DB::Update('UPDATE beneficiario
 SET  nombre_bene=?, apelldido_bene=?, id_lugar=?
WHERE id_bene=?',array($request->nombre_bene,$request->apelldido_bene,$request->id_lugar,$id));
Session::flash('save','Beneficiario modificado correctamente');
return redirect('/beneficiarios');
  }

  public function destroy($id)
  {

  try {

      $data1=array($id);
      DB::delete("DELETE  FROM telefono WHERE id_bene = ?",$data1);
    DB::delete("DELETE   FROM beneficiario WHERE id_bene = ?",$data1);
    Session::flash('save','Beneficiario eliminado correctamente');
    return redirect('/beneficiarios');

      }catch (\Illuminate\Database\QueryException $e){
          Session::flash('delete','No es posible eliminar este beneficiario');
    return redirect('/beneficiarios');
      }

  }

  public function buscarB(Request $request)
  {

      $nombre=$request->nombre;

       $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");

       $beneficiarios=DB::select("SELECT beneficiario.id_bene,beneficiario.nombre_bene,beneficiario.apelldido_bene,personal.id_personal||' '||personal.nombre_personal||' '||personal.apellido_personal as perso , l1.nombre_lugar as parroquia,l2.nombre_lugar as municipio,l3.nombre_lugar as estado,l4.nombre_lugar as pais from beneficiario,personal,lugar l1,lugar l2,lugar l3,lugar l4 where beneficiario.id_lugar=l1.id_lugar and (l1.lugar_per=l2.id_lugar) and (l2.lugar_per=l3.id_Lugar) and (l3.lugar_per=l4.id_Lugar) and (beneficiario.cod_personal= personal.id_personal) and (beneficiario.nombre_bene LIKE '$nombre%');");
 $personal=DB::select("SELECT id_personal, id_personal||' '||nombre_personal||' '||apellido_personal as perso from personal;");
     if(count($beneficiarios) > 0)
      return view('portal/airucab-beneficiario',compact('lugares','beneficiarios','personal'));
      else{
            Session::flash('delete','No se encontraron resultados');
    return redirect('/beneficiarios');
      }
  }

}
