<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Lugar;
use App\Http\Requests;
use DB;
use Session;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");

         $clientes=DB::select("SELECT cliente.id_cliente,cliente.nombre_cliente,cliente.apellido,cliente.rif,cliente.dni,cliente.montoac,l1.nombre_lugar as parroquia,l2.nombre_lugar as municipio,l3.nombre_lugar as estado,l4.nombre_lugar as pais from cliente,lugar l1,lugar l2,lugar l3,lugar l4 where cliente.id_lugar=l1.id_lugar and (l1.lugar_per=l2.id_lugar) and (l2.lugar_per=l3.id_Lugar) and (l3.lugar_per=l4.id_Lugar);");

        return view('portal/airucab-clientes',compact('lugares','clientes'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $nombre=$request->nombre_cliente;
    $apellido=$request->apellido;
    $dni=$request->dni;
    $rif=$request->rif;
    $parroquia=$request->id_lugar;
    $monto=$request->montoac;
    $telefono[]=$request->telefono;
    $mail[]=$request->mail;
    $web[]=$request->web;
    $codarea[]=$request->codarea;
    $fecha=$request->fecha_ini;
    $fecha=date("d/m/Y", strtotime($fecha));

    $idprov=DB::select("SELECT id_cliente from Cliente
          order by id_cliente desc limit 1");

          foreach ($idprov as $key)
          {
            $re=$key->id_cliente;
          }
          $re=intval($re);
          $re=$re+1;

          if ($dni!='') {
        DB::insert('INSERT INTO cliente(
          id_cliente, nombre_cliente, montoac, fechaini, dni, apellido, id_lugar)
          VALUES (?, ?, ?, ?, ?, ?, ?)', [$re,$nombre,$monto,$fecha,$dni,$apellido,$parroquia]);
            }
            if ($rif!='') {
          DB::insert('INSERT INTO cliente(
          id_cliente, nombre_cliente, montoac, fechaini,rif, id_lugar)
          VALUES (?, ?, ?, ?, ?, ?)', [$re,$nombre,$monto,$fecha,$rif,$parroquia]);
          }
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
            (cod_telf,cod_area, numerotelf, id_cliente)
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
            (id_web,url,id_cliente)
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
            (id_correo,mail,id_cliente)
            VALUES (?,?, ?)', [$cc,$mail[$i],$re]);
            $i=$i+1;
          }
        }




 Session::flash('save','Cliente creado correctamente');
      return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_cliente=$id;

        $lugares=DB::select("SELECT * from Lugar order by nombre_lugar;");


        $clientes=DB::select("SELECT cliente.id_cliente,cliente.nombre_cliente,cliente.apellido,cliente.rif,cliente.dni,cliente.montoac,l1.nombre_lugar as parroquia,l2.nombre_lugar as municipio,l3.nombre_lugar as estado,l4.nombre_lugar as pais from cliente,lugar l1,lugar l2,lugar l3,lugar l4 where cliente.id_lugar=l1.id_lugar and (l1.lugar_per=l2.id_lugar) and (l2.lugar_per=l3.id_Lugar) and (l3.lugar_per=l4.id_Lugar);");


         $client=DB::selectOne("SELECT cliente.id_cliente,cliente.nombre_cliente,cliente.apellido,cliente.rif,cliente.dni,cliente.montoac,cliente.fechaini,l1.nombre_lugar as parroquia,l2.nombre_lugar as municipio,l3.nombre_lugar as estado,l4.nombre_lugar as pais, correo.mail as mail from cliente,lugar l1,lugar l2,lugar l3,lugar l4, correo where cliente.id_cliente=$id_cliente and cliente.id_cliente=correo.id_cliente and cliente.id_lugar=l1.id_lugar and (l1.lugar_per=l2.id_lugar) and (l2.lugar_per=l3.id_Lugar) and (l3.lugar_per=l4.id_Lugar);");

         $telefono=DB::select("SELECT cod_telf,cod_area,numerotelf from telefono where id_cliente=$id_cliente");

         $correo=DB::select("SELECT id_correo,mail from correo where id_cliente=$id_cliente");

         $web=DB::select("SELECT id_web,url from web where id_cliente=$id_cliente");

        return view('portal/airucab-clientesEdit',compact('lugares','clientes','client','telefono','correo','web'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      if ($request->dni!='') {
        DB::update("UPDATE cliente set nombre_cliente=?, apellido=?,montoac=?,fechaini=?,dni=?,id_lugar=? WHERE id_cliente=?",array($request->nombre_cliente,$request->apellido,$request->montoac,$request->fechaini,$request->dni,$request->id_lugar,$id));
              }
              if ($request->rif!='') {
                DB::update("UPDATE cliente set nombre_cliente=?,montoac=?,fechaini=?,rif=?,id_lugar=? WHERE id_cliente=?",array($request->nombre_cliente,$request->montoac,$request->fechaini,$request->rif,$request->id_lugar,$id));
                      }
            // cambio los telefonos
            $num= count($request->telefono);
        $id_telefono=DB::select("SELECT cod_telf from telefono where id_cliente=$id;");
        for($i=0;$i<$num;$i++){
        $telefono= $request->telefono[$i];
        DB::update('UPDATE telefono set
        cod_area=?, numerotelf=?
         WHERE cod_telf=?', array($request->codarea[$i],$telefono,$id_telefono[$i]->cod_telf));
        }

         // cambio los correos
      $num= count($request->mail);
      $id_mail=DB::select("SELECT id_correo  from correo where id_cliente=$id;");
        for($i=0;$i<$num;$i++){
        $mail= $request->mail[$i];
        DB::update('UPDATE correo set
        mail=?
        Where id_correo=?', array($mail,$id_mail[$i]->id_correo));
        }

        // cambio las web
      $num= count($request->web);
      $id_web=DB::select("SELECT id_web from web where id_cliente=$id;");
        for($i=0;$i<$num;$i++){
        $web= $request->web[$i];
        DB::update('UPDATE web set
        url=?
        WHERE id_web=?', array($web,$id_web[$i]->id_web));
        }


         Session::flash('save','Cliente modificado correctamente');
      return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    try {

        $data1=array($id);
        DB::delete("DELETE  FROM telefono WHERE id_cliente = ?",$data1);
          DB::delete("DELETE  FROM correo WHERE id_cliente = ?",$data1);
            DB::delete("DELETE  FROM web WHERE id_cliente = ?",$data1);
      DB::delete("DELETE   FROM cliente WHERE id_cliente = ?",$data1);
      Session::flash('save','Cliente eliminado correctamente');
      return redirect('/clientes');

        }catch (\Illuminate\Database\QueryException $e){
            Session::flash('delete','No es posible eliminar este cliente');
      return redirect('/clientes');
        }

    }

    public function buscarC(Request $request)
    {

        $nombre=$request->nombre;

         $lugares=DB::select("SELECT nombre_lugar,id_lugar FROM lugar WHERE tipo_lugar='pa' order by nombre_lugar;");

         $clientes=DB::select("SELECT cliente.id_cliente,cliente.nombre_cliente,cliente.apellido,cliente.rif,cliente.dni,cliente.montoac,l1.nombre_lugar as parroquia,l2.nombre_lugar as municipio,l3.nombre_lugar as estado,l4.nombre_lugar as pais from cliente,lugar l1,lugar l2,lugar l3,lugar l4 where cliente.nombre_cliente like '$nombre%' and cliente.id_lugar=l1.id_lugar and (l1.lugar_per=l2.id_lugar) and (l2.lugar_per=l3.id_Lugar) and (l3.lugar_per=l4.id_Lugar);");

       if(count($clientes) > 0)
        return view('portal/airucab-clientes',compact('lugares','clientes'));
        else{
              Session::flash('delete','No se encontraron resultados');
      return redirect('/clientes');
        }
    }

}
