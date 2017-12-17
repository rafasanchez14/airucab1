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

        
        // cuento la cantidad de clientes
        $id_cliente=DB::selectOne("SELECT count(id_cliente) as cant from cliente;");
        // inserto el cliente con el id+1 de la consulta anterior
        $sql='INSERT INTO cliente (id_cliente,nombre_cliente,montoac,fechaini,dni,apellido,rif,id_lugar) VALUES (?,?,?,?,?,?,?,?)';
      DB::insert($sql,array($id_cliente->cant+1,$request->nombre_cliente,$request->montoac,$request->fechaini,$request->dni,$request->apellido,$request->rif,$request->id_lugar));

      // inserto los telefonos
      $num= count($request->telefono);
        for($i=0;$i<$num;$i++){
        $telefono= $request->telefono[$i];
        $id_telefono=DB::selectOne("SELECT count(cod_telf) as cant from telefono;");
        DB::insert('INSERT INTO telefono
        (cod_telf,cod_area,numerotelf,id_cliente)
        VALUES (?,?,?,?)', [$id_telefono->cant+1,$request->codarea[$i],$telefono,$id_cliente->cant+1]);
        }

          // inserto los correos
      $num= count($request->mail);
        for($i=0;$i<$num;$i++){
        $mail= $request->mail[$i];
        $id_mail=DB::selectOne("SELECT count(id_correo) as cant from correo;");
        DB::insert('INSERT INTO correo
        (id_correo,mail,id_cliente)
        VALUES (?,?,?)', [$id_mail->cant+1,$mail,$id_cliente->cant+1]);
        }

        // inserto las web
      $num= count($request->web);
        for($i=0;$i<$num;$i++){
        $web= $request->web[$i];
        $id_web=DB::selectOne("SELECT count(id_web) as cant from web;");
        DB::insert('INSERT INTO web
        (id_web,url,id_cliente)
        VALUES (?,?,?)',[$id_web->cant+1,$web,$id_cliente->cant+1]);
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

        
        DB::update("UPDATE cliente set nombre_cliente=?, apellido=?,montoac=?,fechaini=?,dni=?,rif=?,id_lugar=? WHERE id_cliente=?",array($request->nombre_cliente,$request->apellido,$request->montoac,$request->fechaini,$request->dni,$request->rif,$request->id_lugar,$id)); 

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
      DB::delete("DELETE FROM cliente WHERE id_cliente = ?",$data1);
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
